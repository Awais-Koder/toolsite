<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalEvent extends Model
{
    protected $fillable = [
        'month',
        'day',
        'year',
        'title',
        'event',
        'wikipedia_url',
    ];
}
