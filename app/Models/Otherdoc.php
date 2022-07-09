<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otherdoc extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'otherdocs';
    protected $fillable = [
        'otherdoc',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
      }
}
