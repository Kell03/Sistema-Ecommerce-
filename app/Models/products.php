<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{

    public function scopeBuscarpor($query, $type, $data){
      
            if(($type) && ($data)){

                return $query->where($type, 'like', "%$data%");

             }



           

    }


    

     use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "products";
    protected $primaryKey = "id_products";

    protected $hidden = ['created_at', 'updated_at'];

    public function cat() {

        return $this->hasOne(categories::class, 'id_category', 'category'); // id de la categoria, relacion con la otra tabla id categoria desde la otra tabla
    }

}
