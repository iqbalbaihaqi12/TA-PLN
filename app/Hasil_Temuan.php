<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_Temuan extends Model
{
    protected $table = "hasil__temuans";
    protected $primaryKey = "id";
    protected $fillable = ['id','tanggal','nomor_temuan','konstruksi','kategori_temuan','detail_temuan','section','alamat_temuan'
                            ,'koordinat','potensi_bahaya','evidence','jadwal_inspeksi_id'];

    public function tindaklanjut()
    {
        return $this->belongsTo('App\Tindak_lanjut', 'id', 'hasil_temuan_id');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal_Inspeksi', 'jadwal_inspeksi_id', 'id');
    }
}
