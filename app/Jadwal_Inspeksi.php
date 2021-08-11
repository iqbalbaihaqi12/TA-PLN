<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_Inspeksi extends Model
{
    //
    protected $table = "jadwal_inspeksi";
    protected $primaryKey = "id";
    protected $fillable = ['id','tanggal','penyulang','section'];
}
