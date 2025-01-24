<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrowing extends Model
{
    use HasFactory, SoftDeletes;

      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'users_id',
        'status',
        'documents_id',
        'borrow_date',
        'return_date',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id','id');
    }

    public function document(){
        return $this->hasOne(Document::class,'id','documents_id');
    }


}
