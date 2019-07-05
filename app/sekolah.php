<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    protected $fillable = ['Kepala_sekolah','Wali_kelas','Wakasek_kesiswaan','Wakasek_kurikulum','Ketua_murid'];
}
