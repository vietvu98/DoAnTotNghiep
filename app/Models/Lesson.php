<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;
    protected $fillable = [
             'tenbh', 'video','lythuyet','makh_onl'];
    protected $primaryKey = 'mabh';
    protected $table = 'baihoc';
}
