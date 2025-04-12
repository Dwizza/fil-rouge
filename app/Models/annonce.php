<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annonce extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'location',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }  

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
