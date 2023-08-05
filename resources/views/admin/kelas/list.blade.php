@extends('admin.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.min.css') }}">
@endsection

@section('content')
    <div class="container">

        @if (session('success'))
            <script>
                Swal.fire(
                    'Berhasil',
                    '{{ session('success') }}',
                    'success'
                )
            </script>
        @endif

        {{-- Modal --}}
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tambah Kelas
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambahkan Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin-kelas" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="Tingkat">Tingkat</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('tingkat') is-invalid @enderror"
                                            id="Tingkat" placeholder="Ex : 1" name="tingkat" value="{{ old('tingkat') }}">
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
                                            value="{{ old('nama_kelas') }}">
                                        @error('nama_kelas')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
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
                    <th>Tingkat</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->tingkat }}</td>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>
                            <div class="d-inline">
                                <span><a href="/admin-kelas/{{ $k->id }}/edit" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a></span>
                                <form action="/admin-kelas/{{ $k->id }}" class="d-inline" method="POST">
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
