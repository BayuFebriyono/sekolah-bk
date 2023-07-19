@extends('admin.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="container">


        {{-- Modal --}}
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tambah Siswa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambahkan Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin-siswa" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="TahunMasuk">Tahun Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('tahun_masuk') is-invalid @enderror" id="TahunMasuk"
                                            placeholder="Ex : 2021/2022" name="tahun_masuk"
                                            value="{{ old('tahun_masuk') }}">
                                        @error('tahun_masuk')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="NomorInduk">Nomor Induk</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('nomor_induk') is-invalid @enderror" id="NomorInduk"
                                            placeholder="Ex : 087654" name="nomor_induk" value="{{ old('nomor_induk') }}">
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
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea id="basic-default-message" class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="Ex : Dsn Jasem RT 05 Rw 02 Kec.Ngoro Kab. Mojokerto" name="alamat" required>{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-check mt-3">
                                            <input name="jenis_kelamin" class="form-check-input" type="radio"
                                                value="L" id="defaultRadio1"
                                                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}
                                                {{ old('jenis_kelamin') ? '' : 'checked' }}>
                                            <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="jenis_kelamin" class="form-check-input" type="radio"
                                                value="P" id="defaultRadio2"
                                                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="NamaWali">Nama Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror"
                                            id="NamaWali" placeholder="Ex : Komarudin" name="nama_wali"
                                            value="{{ old('nama_wali') }}">
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
                                            value="{{ old('hp_siswa') }}">
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
                                            placeholder="Ex : 08384567827" name="hp_wali" value="{{ old('hp_wali') }}">
                                        @error('hp_wali')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="TesDIagnostik">Tes Diagnostik</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="TesDIagnostik"
                                            name="tes_diagnostik" required value="{{ old('tes_diagnostik') }}">
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tahun Masuk</th>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No HP Siswa</th>
                    <th>No HP Wali</th>
                    <th>Tes Diagnostik</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->tahun_masuk }}</td>
                        <td>{{ $s->nomor_induk }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>{{ $s->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>{{ $s->hp_siswa }}</td>
                        <td>{{ $s->hp_wali }}</td>
                        <td>{{ $s->tes_diagnostik }}</td>
                        <td>
                            <div class="d-inline">
                                <span><a href="/admin-siswa/{{ $s->id }}/edit"
                                        class="btn btn-warning mb-2">Edit</a></span>
                                <form action="/admin-siswa/{{ $s->id }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

@section('add-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
        });
    </script>
@endsection
