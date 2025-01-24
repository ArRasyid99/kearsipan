<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = ['name'];


    public function labels(){
        return $this->hasMany(Document::class, 'labels_id', 'id');
    }
}
