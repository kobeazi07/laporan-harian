<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScopeWork extends Model
{
    use HasFactory;

    protected $table = 'scope_work';

    protected $fillable = [
        'nama',
        'kode',
    ];
}
