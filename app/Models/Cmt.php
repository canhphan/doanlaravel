<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmt extends Model
{
    use HasFactory;
     protected $table='cmt';
    public $timestamp=true;
    protected $fillable=['id','idblog','iduser','cmt','name','avatar'];
}
