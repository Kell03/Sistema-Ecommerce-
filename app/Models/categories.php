<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{

    public function scopeBuscarpor($query, $type, $data){
      
            if(($type) && ($data)){

                return $query->where($type, 'like', "%$data%");

             }



           

    }




    
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "categories";
    protected $primaryKey = "id_category";

    protected $hidden = ['created_at', 'updated_at'];

}
