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
        'archive_number',
        'categories_id',
        'labels_id',

    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($document) {
            // Buat nomor arsip otomatis
            $document->archive_number = 'INS-' . date('Y') . '-' . str_pad(Document::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }


    public function category(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function label(){
        return $this->belongsTo(Label::class, 'labels_id', 'id');
    }


}
