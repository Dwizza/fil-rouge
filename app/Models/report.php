<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'annonce_id',
        'message',
    ];
    protected $table = 'signalements';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
