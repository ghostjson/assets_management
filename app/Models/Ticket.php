<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $validated)
 * @method static orderBy(string $string, string $string1)
 * @property mixed id
 */
class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTicketIdAttribute()
    {
        return 10000000000 + $this->id;
    }

}
