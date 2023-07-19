@extends('admin.main.main')
@section('content')
    <div class="container">
        <div class="col-xxl">

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Kelas</h5>
                </div>
                <div class="card-body">
                    <form action="/admin-kelas/{{ $kelas->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Tingkat">Tingkat</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('tingkat') is-invalid @enderror"
                                    id="Tingkat" placeholder="Ex : 1" name="tingkat"
                                    value="{{ old('tingkat') ?? $kelas->tingkat }}">
                                @error('tingkat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NamaKelas">Nama Kelas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                    id="NamaKelas" placeholder="Ex : A" name="nama_kelas"
                                    value="{{ old('nama_kelas') ?? $kelas->nama_kelas }}">
                                @error('nama_kelas')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
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
        </div>
    </div>
@endsection
