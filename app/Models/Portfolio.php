<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'portfolios';
    protected $fillable = [
        'portfolio',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
      }
}
