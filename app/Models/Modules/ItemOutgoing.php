<?php

namespace App\Models\Modules;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOutgoing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_outgoing',
        'tanggal_outgoing',
        'tanggal_pengiriman',

        // Foreign Keys
        // Branch
        'branch_id',

        // User
        'packed_by',
        'checked_by',
        'approved_by',
    ];

    // Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // User
    public function packedBy()
    {
        return $this->belongsTo(User::class, 'packed_by');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
