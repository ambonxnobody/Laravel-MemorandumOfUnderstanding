@extends('welcome')
@section('contents')
    
{{-- Hero Start --}}
@auth
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">Memorandum of Understanding</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <a href="#MoUTerbaru" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">MoU Terbaru</a>
                    <a href="/MoU" class="btn btn-outline-secondary btn-lg px-4">Selengkapnya</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="https://source.unsplash.com/3438x2168?teamwork" alt="" width="720">
            </div>
        </div>
    </div>
@else  
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Memorandum of Understanding</h1>
                <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="/daftar" method="POST" class="p-4 p-md-5 border rounded-3 bg-light needs-validation" novalidate>
                    @csrf
                    <h2 class="fw-bold mb-3">Daftar</h2>
                    <div class="form-floating mb-3 position-relative">
                        <input type="text" name="username" class="form-control rounded-4 @error('username')is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                        <label class="form-label" for="username">Username</label>
                        @error('username')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" name="password" class="form-control rounded-4 @error('password')is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}" required>
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Daftar</button>
                    <div class="mb-2 text-center">
                        <small class="text-muted">Sudah punya akun?</small>
                    </div>
                    <a href="/masuk" class="w-100 mb-2 btn btn-lg rounded-4 btn-outline-secondary" type="button">Masuk</a>
                </form>
            </div>
        </div>
    </div>
@endauth
{{-- Hero End --}}

{{-- Album Start --}}
{{-- <div class="album py-5">
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
</div> --}}
{{-- Album End --}}
<h1 class="text-center" id="MoUTerbaru">MoU Terbaru</h1>
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
                @auth
                    <th>Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($MoUs as $MoU)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @auth
                        <td><a target="_blank" href="storage/{{ $MoU->fileMoU }}">{{ $MoU->judul }}</a></td>
                    @else
                        <td>{{ $MoU->judul }}</td>
                    @endauth
                    <td>{{ $MoU->denganPihak }}</td>
                    {{-- <td>{{ $MoU->kerjasama->nama }}</td> --}}
                    <td>{{ \Carbon\Carbon::create($MoU->waktuSelesai)->diffForHumans() }}</td>
                    <td><span class="badge rounded-pill {{ ($MoU->status === "Berlaku") ? "bg-success" : (($MoU->status === "Hampir Berakhir") ? "bg-warning" : "bg-danger") }}">{{ $MoU->status }}</span></td>
                    @auth
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
                    @endauth
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
                @auth
                    <th>Aksi</th>
                @endauth
            </tr>
        </tfoot>
    </table>
</div>
@endsection
