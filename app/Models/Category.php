<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = ['name'];


    public function documents(){
        return $this->hasMany(Document::class, 'categories_id', 'id');
    }
}
