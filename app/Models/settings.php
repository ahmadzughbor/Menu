<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class settings extends Model
{
    use HasFactory, HasTranslations;
    protected $table ='settings';
    public $translatable = ['Address'];

    protected $fillable = [
        'Address','Mobile','whatsapp_num','facebook','instagram','app_logo'
    ];
}
