<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @method static create(array $validated)
 */
class Asset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setBillAttribute(UploadedFile $file)
    {
        $this->attributes['bill'] = storeFile($file);
    }

}
