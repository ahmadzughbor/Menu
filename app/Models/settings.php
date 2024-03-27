<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class settings extends Model
{
    use HasFactory, HasTranslations;
    protected $table ='settings';
    public $translatable = ['Address','Mobile','Copyright','whatsapp_num','navigate_menu'];

    protected $fillable = [
        'Address','Mobile','whatsapp_num','facebook','instagram','app_logo','background_image','Copyright','Working_from','Working_to','sunday_to','sunday_from','tiktok','navigate_menu'
    ];
}
