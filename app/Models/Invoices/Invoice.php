<?php


namespace App\Models\Invoices;
use App\Models\Items\ItemTranslation;
use Illuminate\Database\Eloquent\Model;

class Invoice   extends Model
{
    protected $table = "invoices";

 
    protected $guarded = [];

    public $timestamps = true;
}
