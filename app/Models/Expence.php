<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    /**
     * Attributes that are mass fillabel
     *
     * @var array
     */
    protected $fillable = [
        'reason', 'amount', 'spent_at'
    ];
}
