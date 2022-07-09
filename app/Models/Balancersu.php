<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balancersu extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'balancersus';
    protected $fillable = [
        'user_id',
        'saldo_awal',
        'transaksi',
        'jumlah_transaksi',
        'status',
        'saldo_akhir',
        'penerima',

    ];

    public function user(){
        return $this->belongsTo(User::class);
      }
}