<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkaccess extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'linkaccesses';
    protected $fillable = [
        'title',
        'link',
    ];
}
