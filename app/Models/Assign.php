<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static where(string $string, int $int)
 * @method static orderBy(string $string, string $string1)
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

    public function getSoftwareAttribute(string $value)
    {
        return License::find(json_decode($value));
    }

    public function setSoftwareAttribute(array $value)
    {
        $this->attributes['software'] = json_encode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }

}
