<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\MoU;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        \App\Models\MoU::where('waktuSelesai', '<', \Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'Tidak Berlaku']);
        \App\Models\MoU::whereBetween('waktuSelesai', [\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->update(['status' => 'Hampir Berakhir']);
        return view('contents.welcome', [
            'title' => 'Home',
            'MoUs' => MoU::latest()->limit(10)->get(),
        ]);
    }

    public function about()
    {
        return view('contents.about', [
            'title' => 'About',
        ]);
    }
}
