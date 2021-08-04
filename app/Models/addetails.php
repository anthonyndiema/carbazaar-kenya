<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addetails extends Model
{
    use HasFactory;
    protected $table = 'addetails';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuel_type',
        'interior_type',
        'color',
        'enginesize_cc',
        'descr',
    ];
}