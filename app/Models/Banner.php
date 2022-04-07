<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'image_name',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
