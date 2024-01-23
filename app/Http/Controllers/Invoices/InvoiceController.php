<?php

namespace App\Http\Controllers\Invoices;

use Carbon\Carbon;
use App\Models\Items\Item;
use App\Models\Users\User;
use Illuminate\Http\Request;
use App\Models\Invoices\Invoice;
use Yajra\DataTables\DataTables;
use App\Services\LanguageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Invoices\InvoiceItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

// use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $_languageService)
    {
        // Get the languageService to control langs
        $this->languageService = $_languageService;
    }
    protected function index(Request $request)
    {
        /// diaplay the view index in invoices folder
        return view('invoices.index');
    }

    protected function store(Request $request)
    {
        $rules = [
            'userid' => 'required',
            'date' => 'required|date',
            'data' => 'required|array',
            'data.*.id' => 'required|exists:items,id',
            'data.*.quantity' => 'required|gt:0',
        ];

        $messages = [
            'userid.required' => __('invoice.User ID is required!'),
            'date.required' => __('invoice.Date is required!'),
            'date.date' => __('invoice.Invalid date'),
            'data.required' => __('invoice.Data is required!'),
            'data.array' => __('invoice.Data must be an array'),
            'data.*.id.required' => __('invoice.Each item must have an ID'),
            'data.*.id.exists' => __('invoice.ID does not exist in the items table'),
            'data.*.quantity.required' => __('invoice.Each item must have a quantity'),
            'data.*.quantity.gt' => __('invoice.Quantity must be greater than 0'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // If the validation failed return errors in response json with code 
        // 422 unprocessable content
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            // Start db transaction
            DB::beginTransaction();
            // get data from request
            $data =  ($request->input('data'));
            // Create new invoice
            $invoice = Invoice::create([
                'user_id' => $request->input('userid'),
                'created_at' => $request->input('date'),

            ]);
            // Empty array to hold items that will related to invoice
            $insertedItems = [];
            // loop for given data
            foreach ($data as $item) {
                // Access the ID and quantity
                $id = $item['id'];
                $quantity = $item['quantity'];
                // Access the item to get the price from server side
                $item = Item::find($id);

                $insertedItems[] =
                    [
                        'invoice_id' => $invoice->id,
                        'item_id' => $id,
                        'quantity' => $quantity,
                        'total' => $quantity * $item->price,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
            }
            // Create invoice of items
            InvoiceItem::insert(
                $insertedItems
            );
            // commit the changes to db done changes permanent
            DB::commit();
            // return success in json
            return response()->json('success');
        } catch (\Exception $ex) {
            // cancel the state of save in db
            DB::rollback();
            // Log the error
            Log::error('Error while creating invoice: ' . $ex->getMessage());
            // return error keyword in json
            return response()->json('error');
        }
    }


    protected function getSelectedItems(Request $request)
    {
        $ids = $request->input('ids'); // Retrieve the ids from the request
        // Check if ids is not set
        if (!isset($ids)) {
            return [];
        }
        // get items by ids with trans
        $items = Item::whereIn('id', $ids)->with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();


        // Check if the response is empty
        if ($items->isEmpty()) {
            return [];
        }
        // return items after fetch them
        return $items;
    }
    public function getUsers(Request $request)
    {
        // fetch the current users with translation
        $users = User::with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();
        // return json users
        return response()->json($users);
    }


    protected function getItems(Request $request)
    {
        // fetch the current Items with translation
        $items = Item::with(['translations' => function ($query) {
            $query->where('language_id', $this->languageService->getLangId());
        }])->get();
        // return json items
        return response()->json($items);
    }
}
