<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class StockOpnameDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_start',
        'so_end',
        'actual_qty',
        'system_qty',
        'diff_qty',
        'positive_diff_qty',
        'negative_diff_qty',
        'adjustment_date',
        'adjustment_status',
        'adjustment_type',
        'adjustment_reason',

        // Foreign Keys
        // Item
        'item_id',

        // Employee
        'open_by',
        'close_by',
        'adjustment_by',

        // Stock Opname
        'stock_opname_id',
    ];

    // Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // Employee
    public function openBy()
    {
        return $this->belongsTo(User::class, 'open_by');
    }

    public function closeBy()
    {
        return $this->belongsTo(User::class, 'close_by');
    }

    public function adjustmentBy()
    {
        return $this->belongsTo(User::class, 'adjustment_by');
    }
}
