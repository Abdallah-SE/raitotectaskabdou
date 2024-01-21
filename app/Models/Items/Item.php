<?php

namespace App\Models\Items;

use App\Models\Items\ItemTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item   extends Model
{
    use HasFactory;

    protected $table = "items";
    protected $guarded = [];
    public $timestamps = true;

    public function translations()
    {
       return $this->hasMany(ItemTranslation::class);
    }
}
