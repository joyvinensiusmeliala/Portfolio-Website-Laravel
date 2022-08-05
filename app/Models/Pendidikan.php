<?php

// namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $fillable=['tempat_pendidikan','jenjang_pendidikan','jurusan','start_pendidikan','end_pendidikan','status','photo'];
}
