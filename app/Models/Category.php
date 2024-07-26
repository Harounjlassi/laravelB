<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
    
        'user_id',
        'category_name',
    ];
    // one to many relation ship fel model eloquent ORM
    public function user(){
        return $this->hasOne(User::class,'id','user_id');

    }






}
