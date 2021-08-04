<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehfeatures extends Model
{
    use HasFactory;
    protected $table = 'vehfeatures';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'listingid',
        'feature',
    ];
}