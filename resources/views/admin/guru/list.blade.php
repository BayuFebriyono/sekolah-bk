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
                Tambah Guru
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambahkan Guru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin-guru" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="Nip">nip</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                            id="Nip" placeholder="Ex : 324874827" name="nip"
                                            value="{{ old('nip') }}">
                                        @error('nip')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="Nama">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="Nama" placeholder="Ex : Bagus Subarjo" name="nama"
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
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $g)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $g->nip }}</td>
                        <td>{{ $g->nama }}</td>
                        <td>{{ $g->alamat }}</td>
                        <td>{{ $g->jenis_kelamin == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>
                            <div class="d-inline">
                                <span><a href="/admin-guru/{{ $g->id }}/edit" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a></span>
                                <form action="/admin-guru/{{ $g->id }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
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
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $("#modalCenter").modal('show');
            });
        </script>
    @endif
@endsection
