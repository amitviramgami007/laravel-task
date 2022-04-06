<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'product_name',
        'price',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
