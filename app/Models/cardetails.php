<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardetails extends Model
{
    use HasFactory;
    protected $table = 'cardetails';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'make_model',
        'make_year',
        'mileage',
        'body_type',
        'condition_type',
        'transmission',
        'price',
        'duty',
        'negotiable',
    ];
}