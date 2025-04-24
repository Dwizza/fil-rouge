<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'annonce_id',
        'amount',
        'status',
        'paid_at'
    ];
    protected $table = 'paiements';
    public function annonce()
    {
        return $this->belongsTo(annonce::class);
    }
}
