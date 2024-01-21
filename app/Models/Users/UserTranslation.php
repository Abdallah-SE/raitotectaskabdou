<?php

namespace App\Models\Users; 
use Illuminate\Database\Eloquent\Model;

class UserTranslation   extends Model
{
 
 
    protected $table = "users_translations";
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'name',
     ];

  
     public function user(){
        return $this->belongsTo(User::class);
     }
}
