<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'nama','moto', 'jurusan', 'tentang_saya', 'ajakan', 'ig', 'tw','tk', 'yt','git', 'fb'];
}
