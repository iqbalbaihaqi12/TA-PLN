<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_Temuan extends Model
{
    protected $table = "hasil__temuans";
    protected $primaryKey = "id";
    protected $fillable = ['id','tanggal','konstruksi','kategori_temuan','detail_temuan','section','alamat_temuan'
                            ,'koordinat','potensi_bahaya','evidence','jadwal_inspeksi_id'];
}
