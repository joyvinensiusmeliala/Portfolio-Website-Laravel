<?php

// namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=['nama_project','penyelenggara','deskripsi','lokasi','tools','sebagai','start_project','end_project'];
}
