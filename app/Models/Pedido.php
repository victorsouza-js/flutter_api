<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Adicione outros campos necessários, como 'status', 'total', etc.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com produtos, se necessário
    // public function produtos()
    // {
    //     return $this->belongsToMany(Produto::class);
    // }
}
