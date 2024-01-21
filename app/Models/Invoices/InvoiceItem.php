<?php


namespace App\Models\Invoices;
use App\Models\Items\ItemTranslation;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem   extends Model
{
    protected $table = "invoice_item";

 
    protected $guarded = [];

    public $timestamps = true;
}
