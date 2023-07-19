@extends('admin.main.main')
@section('content')
    <div class="container">
        <div class="col-xxl">

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="/admin-siswa/{{ $siswa->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="TahunMasuk">Tahun Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                                    id="TahunMasuk" placeholder="Ex : 2021/2022" name="tahun_masuk"
                                    value="{{ old('tahun_masuk') ?? $siswa->tahun_masuk }}">
                                @error('tahun_masuk')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NomorInduk">Nomor Induk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror"
                                    id="NomorInduk" placeholder="Ex : 087654" name="nomor_induk"
                                    value="{{ old('nomor_induk') ?? $siswa->nomor_induk }}">
                                @error('nomor_induk')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Nama">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="Nama" placeholder="Ex : Burhanudin" name="nama"
                                    value="{{ old('nama') ?? $siswa->nama }}">
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
                            <div class="col-sm-10">
                                <textarea id="basic-default-message" class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Ex : Dsn Jasem RT 05 Rw 02 Kec.Ngoro Kab. Mojokerto" name="alamat" required>{{ old('alamat') ?? $siswa->alamat }}</textarea>
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
                                        @elseif ($siswa->jenis_kelamin == 'L')
                                            {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                                </div>
                                <div class="form-check">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="P"
                                        id="defaultRadio2"
                                        @if (old('jenis_kelamin') == 'P') {{ 'checked' }}
                                    @elseif ($siswa->jenis_kelamin == 'P')
                                        {{ 'checked' }} @endif>
                                    <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="NamaWali">Nama Wali</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('nama_wali') is-invalid @enderror"
                                    id="NamaWali" placeholder="Ex : Komarudin" name="nama_wali"
                                    value="{{ old('nama_wali') ?? $siswa->nama_wali }}">
                                @error('nama_wali')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="HpSiswa">No Hp Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" id="HpSiswa"
                                    class="form-control phone-mask @error('hp_siswa') is-invalid @enderror"
                                    placeholder="Ex : 08384567827" name="hp_siswa"
                                    value="{{ old('hp_siswa') ?? $siswa->hp_siswa }}">
                                @error('hp_siswa')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="HPWali">No Hp Wali</label>
                            <div class="col-sm-10">
                                <input type="text" id="HPWali"
                                    class="form-control phone-mask @error('hp_wali') is-invalid @enderror"
                                    placeholder="Ex : 08384567827" name="hp_wali"
                                    value="{{ old('hp_wali') ?? $siswa->hp_wali }}">
                                @error('hp_wali')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="TesDIagnostik">Tes Diagnostik</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="TesDIagnostik" name="tes_diagnostik"
                                    required value="{{ old('tes_diagnostik') ?? $siswa->tes_diagnostik }}">
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
