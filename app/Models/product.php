<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory, HasTranslations;
    protected $table ='products';
    protected $fillable = [
        'title','description','cover'
    ];

    public $translatable = ['title','description'];


    public function uploads (){

        return $this->hasMany(uploads::class ,'product_id');
    }

}
