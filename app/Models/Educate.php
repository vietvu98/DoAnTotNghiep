<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educate extends Model
{
    public $timestamps = false;
    protected $fillable = [
             'tendaotao'];
    protected $primaryKey = 'madaotao';
    protected $table = 'daotao';
}
