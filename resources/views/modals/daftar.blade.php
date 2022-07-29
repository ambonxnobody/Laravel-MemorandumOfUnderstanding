{{-- Modal Start --}}
<div class="modal fade modal-signin py-5" id="modalDaftar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Daftar</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="/daftar" method="POST" class="needs-validation" novalidate>
                    @csrf
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
                    <small class="text-muted">Dengan mengklik Daftar, Anda menyetujui persyaratan penggunaan.</small>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal End --}}