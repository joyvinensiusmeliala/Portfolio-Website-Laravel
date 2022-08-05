<?php

// namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable=['nama_project','penyelenggara','deskripsi','lokasi','photo','tools','sebagai','start_project','end_project'];
}
