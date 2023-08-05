@extends('admin.main.main')
@section('add-css')
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.min.css') }}">
@endsection
@section('content')
    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Profil</h5>
        </div>
        <div class="card-body">
            <form action="/admin-edit" method="POST">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="Nip">nip</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="Nip"
                            placeholder="Ex : 324874827" name="nip" value="{{ old('nip') ?? $admin->nip }}">
                        @error('nip')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="Nama">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="Nama"
                            placeholder="Ex : Bagus Subarjo" name="nama" value="{{ old('nama') ?? $admin->nama }}">
                        @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
                    <div class="col-sm-10">
                        <textarea id="basic-default-message" class="form-control @error('alamat') is-invalid @enderror"
                            placeholder="Ex : Dsn Jasem RT 05 Rw 02 Kec.Ngoro Kab. Mojokerto" name="alamat" required>{{ old('alamat') ?? $admin->alamat }}</textarea>
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <div class="form-check mt-3">
                            <input name="jenis_kelamin" class="form-check-input" type="radio" value="L"
                                id="defaultRadio1"
                                @if (old('jenis_kelamin') == 'L') {{ 'checked' }}
                            @elseif ($admin->jenis_kelamin == 'L')
                                {{ 'checked' }} @endif>
                            <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                        </div>
                        <div class="form-check">
                            <input name="jenis_kelamin" class="form-check-input" type="radio" value="P"
                                id="defaultRadio2"
                                @if (old('jenis_kelamin') == 'P') {{ 'checked' }}
                            @elseif ($admin->jenis_kelamin == 'P')
                                {{ 'checked' }} @endif>
                            <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                        </div>
                    </div>

                </div>



                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
