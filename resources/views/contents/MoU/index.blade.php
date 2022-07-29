@extends('welcome')
@section('contents')

{{-- Album Start --}}
{{-- <h1 class="text-center mt-5" id="listOfMoU">Semua MoU</h1>
<div class="text-center">
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambahMoU">Tambah MoU</button>
</div>
<div class="album py-3">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($MoUs as $MoU)
                <div class="col">
                    <div class="card shadow-sm">
                        @if ($MoU->fileMoU)
                        <div style="max-height:225px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $MoU->fileMoU) }}" alt="{{ $MoU->kerjasama->nama }}">
                        </div>
                        @else
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">MoU Preview</text></svg>
                        @endif

                        <div class="card-body">
                            <ul>
                                <li>w/{{ $MoU->denganPihak }}</li>
                                <li>{{ $MoU->kerjasama->nama }}</li>
                            </ul>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/MoU/{{ $MoU->id }}" type="button" class="btn btn-sm btn-outline-primary">Detail</a>
                                    <a href="/MoU/{{ $MoU->id }}/edit" type="button" class="btn btn-sm btn-outline-warning">Ubah</a>
                                </div>
                                <small class="text-muted">Sampai: {{ $MoU->waktuSelesai }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {{ $MoUs->links() }}
</div> --}}
{{-- Album End --}}
<h1 class="text-center mt-5">Semua MoU</h1>
<div class="text-center mb-3">
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambahMoU"><i class="bi bi-clipboard-plus-fill"></i> Tambah MoU</button>
</div>
<p class="text-center">Catatan : Jika Anda ingin mereview file pdf tanpa download, diwajibkan mematikan akses Internet Download Manager untuk URL ini</p>
<div class="container">
    <table id="example" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Bekerjasama dengan</th>
                {{-- <th>Jenis MoU</th> --}}
                <th>Masa Berlaku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($MoUs as $MoU)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a target="_blank" href="storage/{{ $MoU->fileMoU }}">{{ $MoU->judul }}</a></td>
                    <td>{{ $MoU->denganPihak }}</td>
                    {{-- <td>{{ $MoU->kerjasama->nama }}</td> --}}
                    <td>{{ \Carbon\Carbon::create($MoU->waktuSelesai)->diffForHumans() }}</td>
                    <td><span class="badge rounded-pill {{ ($MoU->status === "Berlaku") ? "bg-success" : (($MoU->status === "Hampir Berakhir") ? "bg-warning" : "bg-danger") }}">{{ $MoU->status }}</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/MoU/{{ $MoU->id }}/edit">Edit</a></li>
                                <li><a class="dropdown-item" href="/MoU/{{ $MoU->id }}">Detail</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Bekerjasama dengan</th>
                {{-- <th>Jenis MoU</th> --}}
                <th>Masa Berlaku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>

@include('modals.tambahMoU')

@endsection
