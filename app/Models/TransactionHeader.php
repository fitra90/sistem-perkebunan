<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'notrans',
        'tanggal',
        'divisi',
        'totalbuah',
        'created_by',
        'last_by',
        'password',
    ];

}
