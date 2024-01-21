<?php

namespace App\Http\Controllers\Invoices;

use App\Models\Items\Item;
use App\Models\Users\User;
use Illuminate\Http\Request;
use App\Models\Invoices\Invoice;
use Yajra\DataTables\DataTables;
use App\Services\LanguageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Invoices\InvoiceItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

// use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $_languageService)
    {
        $this->languageService = $_languageService;
    }
    protected function index(Request $request)
    {

        return view('invoices.index');
    }

    protected function store(Request $request)
    {
        $rules = [
            'userid' => 'required',
            'date' => 'required|date',
            'data' => 'required|array',
            'data.*.id' => 'required|exists:items,id', // assuming items is the table name
            'data.*.quantity' => 'required|gt:0',
            // Add more validation rules as needed...
        ];

        $validator = Validator::make($request->all(), $rules);

         if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            DB::beginTransaction();

            $data =  ($request->input('data')   );
            $invoice = Invoice::create([
                'user_id' => $request->input('userid'),
                'created_at' => $request->input('date'),

            ]);

            foreach ($data as $item) {
                // Access the ID and quantity
                $id = $item['id'];
                $quantity = $item['quantity'];
                $item = Item::find($id);

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'item_id' => $id,
                    'quantity' => $quantity,
                    'total' => $quantity * $item->price
                ]);
            }

            DB::commit();
            return response()->json('success');
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error('Error while creating invoice: ' . $ex->getMessage());
        }
    }


    protected function getSelectedItems(Request $request)
    {
        $ids = $request->input('ids'); // Retrieve the ids from the request
        // Check if ids is not set
        if (!isset($ids)) {
            return [];
        }

        $items = Item::whereIn('id', $ids)->with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();


        // Check if the response is empty
        if ($items->isEmpty()) {
            return [];
        }
        return $items;
    }
    public function getUsers(Request $request)
    {
        $users = User::with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();

        return response()->json($users);
    }


    protected function getItems(Request $request)
    {
        $items = Item::with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();
        return response()->json($items);
    }
}
