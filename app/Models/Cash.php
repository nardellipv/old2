<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;

    protected $fillable = [
        'mount', 'comment', 'payment_id', 'invoice_id', 'move', 'branch_id'
    ];

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
