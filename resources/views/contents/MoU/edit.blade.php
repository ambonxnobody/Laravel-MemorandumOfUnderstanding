@extends('welcome')
@section('contents')

<div class="min-width">
    <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="fw-bold mb-0">Ubah MoU</h2>
    </div>

    <div class="modal-body p-5 pt-0">
        <form action="/MoU/{{ $MoU->id }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-floating mb-3 position-relative">
                <input type="text" name="judul" class="form-control rounded-4 @error('judul')is-invalid @enderror" id="judul" placeholder="Judul Kerjasama" required autofocus value="{{ old('judul', $MoU->judul) }}">
                <label class="form-label" for="judul">Judul Kerjasama</label>
                @error('judul')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3 position-relative">
                <input type="text" name="denganPihak" class="form-control rounded-4 @error('denganPihak')is-invalid @enderror" id="denganPihak" placeholder="Bekerjasama dengan Pihak" required value="{{ old('denganPihak', $MoU->denganPihak) }}">
                <label class="form-label" for="denganPihak">Bekerjasama dengan Pihak</label>
                @error('denganPihak')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3 position-relative">
                <input type="date" name="waktuMulai" class="form-control rounded-4 @error('waktuMulai')is-invalid @enderror" id="waktuMulai" placeholder="Dimulai Kerjasama" value="{{ old('waktuMulai', $MoU->waktuMulai) }}" required>
                <label class="form-label" for="waktuMulai">Dimulai Kerjasama</label>
                @error('waktuMulai')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3 position-relative">
                <input type="date" name="waktuSelesai" class="form-control rounded-4 @error('waktuSelesai')is-invalid @enderror" id="waktuSelesai" placeholder="Berakhir Kerjasama" value="{{ old('waktuSelesai', $MoU->waktuSelesai) }}" required>
                <label class="form-label" for="waktuSelesai">Berakhir Kerjasama</label>
                @error('waktuSelesai')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3 position-relative">
                <select name="kerjasama_id" class="form-select rounded-4 @error('kerjasama_id')is-invalid @enderror" aria-label="Default select example">
                    <option class="form-label" selected hidden disabled>Pilih Tipe MoU</option>
                    @foreach ($kerjasamas as $kerjasama)
                        @if (old('kerjasama_id', $MoU->kerjasama_id) == $kerjasama->id)                            
                            <option value="{{ $kerjasama->id }}" selected>{{ $kerjasama->nama }}</option>
                        @else
                            <option value="{{ $kerjasama->id }}">{{ $kerjasama->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('kerjasama_id')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="mb-3 position-relative">
                <label for="fileMoU" class="form-label">File MoU</label>
                <input type="hidden" name="oldFileMoU" value="{{ $MoU->fileMoU }}">
                <input class="form-control @error('fileMoU') is-invalid @enderror" type="file" id="fileMoU" name="fileMoU">
                @error('fileMoU')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3 position-relative">
                <textarea id="textMoU" name="textMoU" class="form-control @error('textMoU')is-invalid @enderror" placeholder="Tulis keterangan MoU disini (support html tags)" id="floatingTextarea2" style="height: 200px">{!!  old('textMoU', $MoU->textMoU)  !!}</textarea>
                <label for="textMoU">Keterangan</label>
                @error('textMoU')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-success" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
