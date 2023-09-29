<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'offer', 'point', 'point_changed', 'show', 'exchange', 'commission', 'branch_id', 'status'
    ];

    public function Point()
    {
        return $this->hasMany(Point::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
