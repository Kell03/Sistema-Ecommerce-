<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_gallery extends Model
{
     use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "product_gallery";
    protected $primaryKey = "id";

    protected $hidden = ['created_at', 'updated_at'];

}
