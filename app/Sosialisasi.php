<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosialisasi extends Model
{
    protected $table = "sosialisasis";
    protected $primaryKey = "id";
    protected $fillable = ['id','tanggal','evidence','detail'];
}
