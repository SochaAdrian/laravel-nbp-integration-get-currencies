<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    use Uuids;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'currency_code',
        'exchange_rate',
    ];
}
