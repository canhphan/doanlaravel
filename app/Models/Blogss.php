<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogss extends Model
{
    use HasFactory;
    protected $table='blogtable';
    public $timestamp=true;
    protected $fillable=['id','title','image','description','content'];
}
