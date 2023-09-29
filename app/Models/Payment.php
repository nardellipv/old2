<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status'
    ];

    public function Cash()
    {
        return $this->belongsTo(Cash::class);
    }

    public function Sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
