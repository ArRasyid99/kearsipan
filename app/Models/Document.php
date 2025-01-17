<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'directory',
        'categories_id',
        'statuses_id',
    ];


    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function status(){
        return $this->belongsTo(DocumentStatus::class, 'statuses_id', 'id');
    }
}
