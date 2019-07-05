<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class siswi extends Model
{
    protected $fillable = ['nama','umur','hobi','alamat','kelas'];
}
