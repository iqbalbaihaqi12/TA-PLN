<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upaya extends Model
{
    protected $table = "upayas";
    protected $primaryKey = "id";
    protected $fillable = ['id','tanggal','evidence','detail'];
}
