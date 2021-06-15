<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $timestamps = false;
    protected $fillable = [
             'tenbaitest', 'slcauhoi','thoigian','diemso','madaotao'];
    protected $primaryKey = 'id_baitest';
    protected $table = 'baitest';
}
