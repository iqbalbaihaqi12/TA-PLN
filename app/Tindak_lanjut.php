<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tindak_lanjut extends Model
{
    protected $table = "tindak_lanjuts";
    protected $primaryKey = "id";
    protected $fillable = ['id','status','keterangan_tindak_lanjut','hasil_temuan_id','sosialisasi_id','upaya_pencegahan_id'];

    public function sosialisasi()
    {
        return $this->belongsTo('App\Sosialisasi', 'sosialisasi_id', 'id');
    }
    public function upaya()
    {
        return $this->belongsTo('App\Upaya', 'upaya_pencegahan_id', 'id');
    }

}
