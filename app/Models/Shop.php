<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'level1',
        'level2',
        'level3',
        'price',
        'price_sp',
        'count',
        'properties',
        'joint_purchases',
        'unit',
        'picture',
        'show_on_home',
        'description',
    ];
}
