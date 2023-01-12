<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pembayaran';

    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'bulan_id', 'id');
    }
}
