<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = [
             'cauhoi', 'luachona','luachonb','luachonc','luachond','dapan','id_baitest'];
    protected $primaryKey = 'id_cauhoi';
    protected $table = 'ds_cauhoi';
}
