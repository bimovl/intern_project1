<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'cvs';
    protected $fillable = [
        'cv',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
      }
}
