{{-- Header Start --}}
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h3>MoU</h3>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 {{ Request::is('/') ? 'text-secondary' : 'text-white' }}">Home</a></li>
                <li><a href="/MoU" class="nav-link px-2 {{ Request::is('MoU*') ? 'text-secondary' : 'text-white' }}">Semua MoU</a></li>
                <li><a href="/about" class="nav-link px-2 {{ Request::is('about') ? 'text-secondary' : 'text-white' }}">Tentang Kita</a></li>
                {{-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>

            {{-- <form action="/MoU" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                @csrf
                @if (request('kerjasama'))
                    <input type="hidden" name="kerjasama" value="{{ request('kerjasama') }}">
                @endif
                <input type="search" class="form-control form-control-dark" placeholder="Cari MoU..." aria-label="Search">
            </form> --}}

            <div class="text-end">
                @auth
                    <form action="/keluar" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Keluar</button>
                    </form>
                @else
                    <a href="/masuk" type="button" class="btn btn-outline-light me-2">Masuk</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDaftar">Daftar</button>
                @endauth
            </div>
        </div>
    </div>
</header>
{{-- Header End --}}