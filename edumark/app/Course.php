<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = ['id_teacher', 'nama_course', 'keterangan_course', 'harga_course', 'rating_course', 'gambar_course'];
}
