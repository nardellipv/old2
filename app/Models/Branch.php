<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'address'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Client()
    {
        return $this->hasMany(Client::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
