<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function all(){

    };
     protected $table = 'members';
     protected $primaryKey = 'noid';
}
