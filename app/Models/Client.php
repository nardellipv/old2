<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'birthday', 'phone', 'total_points'
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
