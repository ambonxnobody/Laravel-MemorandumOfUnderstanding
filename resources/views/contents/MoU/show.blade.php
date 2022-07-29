@extends('welcome')
@section('contents')
    <div class="card m-5">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Preview MoU with Image File Type</text></svg>
        <div class="card-body">
            <h5 class="card-title">{{ $MoU->judul }}</h5>
            <ul class="card-text">
                <li>Bekerja sama dengan {{ $MoU->denganPihak }}</li>
                <li>Dimulai pada {{ $MoU->waktuMulai }}</li>
                <li>Berakhir pada {{ $MoU->waktuSelesai }}</li>
            </ul>
            <h5 class="card-title">Keterangan MoU</h5>
            <p class="card-text">{!! $MoU->textMoU !!}</p>
            <p class="card-text"><small class="text-muted"><span class="badge rounded-pill {{ ($MoU->status === "Berlaku") ? "bg-success" : (($MoU->status === "Hampir Berakhir") ? "bg-warning" : "bg-danger") }}">{{ $MoU->status }}</small></p>
        </div>
    </div>
@endsection