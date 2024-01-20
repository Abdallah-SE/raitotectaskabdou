<?php

namespace App\Models\Items;

use App\Models\Items\ItemTranslation;
use Illuminate\Database\Eloquent\Model;

class Item   extends Model
{
    protected $table = "items";



    public function translations()
    {
       return $this->hasMany(ItemTranslation::class);
    }
}
