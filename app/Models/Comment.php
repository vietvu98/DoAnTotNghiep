<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'com_id';
    protected $table = 'vp_comment';
    protected $guarded = [];
}
