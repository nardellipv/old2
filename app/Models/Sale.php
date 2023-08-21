<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'product_id', 'payment_id', 'branch_id', 'employee_id', 'price', 'pay', 'comment', 'invoice'
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
