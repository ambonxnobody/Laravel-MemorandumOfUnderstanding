<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function MoUs()
    // {
    //     return $this->hasMany(MoU::class);
    // }
}
