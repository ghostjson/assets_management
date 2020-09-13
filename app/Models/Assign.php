<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create()
 * @method static where(string $string, int $int)
 */
class Assign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getAssetsOf(int $id)
    {
        $asset_ids = Assign::where('user_id', $id)->get()->pluck('asset_id');
        return Asset::find($asset_ids);
    }


}
