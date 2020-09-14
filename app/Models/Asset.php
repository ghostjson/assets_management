<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @method static create(array $validated)
 * @method static where(string $string, string $string='')
 * @method static find(int $id)
 * @property mixed id
 */
class Asset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function returned()
    {
        $this->status = 'unassigned';
        $this->save();


        Assign::where('asset_id', $this->id)
            ->first()
            ->delete();

    }

    public function setBillAttribute(UploadedFile $file)
    {
        $this->attributes['bill'] = storeFile($file);
    }

}
