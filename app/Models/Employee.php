<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'branch_id'
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }
}
