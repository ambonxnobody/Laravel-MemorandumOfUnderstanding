<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\MoU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MoUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (request('kerjasama')) {
        //     $kerjasama = Kerjasama::firstWhere('id', request('kerjasama'));
        //     $title = ' pada jenis ' . $kerjasama->nama;
        // }
        // return view('contents.MoU.index', [
        //     "title" => "Semua MoU" . $title,
        //     "MoUs" => MoU::latest()->filter(request(['search', 'kerjasama']))->paginate(9)->withQueryString(),
        //     "kerjasamas" => Kerjasama::all(),
        // ]);

        \App\Models\MoU::where('waktuSelesai', '<', \Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'Tidak Berlaku']);
        \App\Models\MoU::whereBetween('waktuSelesai', [\Carbon\Carbon::now()->format('Y-m-d'), \Carbon\Carbon::now()->addMonth()->format('Y-m-d')])->update(['status' => 'Hampir Berakhir']);
        return view('contents.MoU.index', [
            'title' => 'Semua MoU',
            'MoUs' => MoU::all(),
            // 'kerjasamas' => Kerjasama::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'fileMoU' => 'required|mimes:pdf',
            'denganPihak' => 'required',
            // 'kerjasama_id' => 'required',
            'waktuMulai' => 'required',
            'waktuSelesai' => 'required',
            'textMoU' => 'max:1000',
        ]);

        $waktuSelesai = $request['waktuSelesai'];
        if ($request['howLong'] === "Tahun") {
            $validatedData['waktuSelesai'] = \Carbon\Carbon::create($validatedData['waktuMulai'])->addYears($waktuSelesai);
        } else if ($request['howLong'] === "Bulan") {
            $validatedData['waktuSelesai'] = \Carbon\Carbon::create($validatedData['waktuMulai'])->addMonths($waktuSelesai);
        } else {
            $validatedData['waktuSelesai'] = \Carbon\Carbon::create($validatedData['waktuMulai'])->addWeeks($waktuSelesai);
        }

        if ($request->file('fileMoU')) {
            $validatedData['fileMoU'] = $request->file('fileMoU')->store('FileMoU');
        }

        MoU::create($validatedData);
        Alert::toast('Data MoU Berhasil Ditambahkan!', 'success');
        return redirect('/MoU');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoU  $moU
     * @return \Illuminate\Http\Response
     */
    public function show(MoU $MoU)
    {
        return view('contents.MoU.show', [
            'title' => 'Detail MoU',
            'MoU' => $MoU,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoU  $moU
     * @return \Illuminate\Http\Response
     */
    public function edit(MoU $MoU)
    {
        return view('contents.MoU.edit', [
            'title' => 'Perubahan MoU',
            'MoU' => $MoU,
            // 'kerjasamas' => Kerjasama::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MoU  $moU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoU $MoU)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'fileMoU' => 'mimes:pdf',
            'denganPihak' => 'required',
            // 'kerjasama_id' => 'required',
            'waktuMulai' => 'required',
            'waktuSelesai' => 'required',
            'textMoU',
        ]);

        if ($request->file('fileMoU')) {
            if ($request->oldFileMoU) {
                Storage::delete($request->oldFileMoU);
            }
            $validatedData['fileMoU'] = $request->file('fileMoU')->store('FileMoU');
        }

        MoU::where('id', $MoU->id)->update($validatedData);
        Alert::toast('Data MoU Berhasil Diubah!', 'success');
        return redirect('/MoU');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoU  $moU
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
