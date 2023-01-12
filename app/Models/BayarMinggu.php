<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BayarMinggu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'bayar_minggu';

     public function siswa()
     {
        return $this->belongsTo(User::class,'user_id','id');
     }
     public function pembayaran()
     {
        return $this->belongsTo(Pembayaran::class,'user_id','id');
     }
}
