<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploads extends Model
{
    use HasFactory;
    protected $table ='uploads';
   
    protected $fillable = [
        'product_id','path','type'
    ];


}
