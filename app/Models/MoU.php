<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoU extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function kerjasama()
    // {
    //     return $this->belongsTo(Kerjasama::class);
    // }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? false, function ($query, $search) {
    //         return $query->where('pihakPertama', 'like', '%' . $search . '%')->orWhere('pihakKedua', 'like', '%' . $search . '%')->orWhere('waktu', 'like', '%' . $search . '%');
    //     });
    //     $query->when($filters['kerjasama'] ?? false, function ($query, $kerjasama) {
    //         return $query->whereHas('kerjasama', function ($query) use ($kerjasama) {
    //             $query->where('id', $kerjasama);
    //         });
    //     });
    // }
}
