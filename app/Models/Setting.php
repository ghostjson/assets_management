<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

/**
 * @method static where(string $string, string $name)
 * @method static create(array $array)
 */
class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function get(string $name)
    {
        return Setting::where('name', $name)->first()['value'];
    }

    public static function updateSettings(array $settings)
    {
        foreach ($settings as $key => $value)
        {
            if($key == 'logo')
            {

                Setting::where('name', $key)
                    ->first()
                    ->update(['value' => storeFile($value)]);
            }else
            {
                Setting::where('name', $key)
                    ->first()
                    ->update(['value' => $value]);
            }
        }
    }

}
