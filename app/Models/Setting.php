<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public static function parsed() {
        $settings = self::get();

        foreach ($settings as $setting) {
            $data[$setting->variable] = $setting->value;
        }

        return $data;
    }
}
