<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balancecash extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'balancecashes';
    protected $fillable = [
        'user_id',
        'saldo_awal',
        'transaksi',
        'jumlah_transaksi',
        'status',
        'saldo_akhir',
        'penerima',
        'pengirim'

    ];

    public function user(){
        return $this->belongsTo(User::class);
      }
}



