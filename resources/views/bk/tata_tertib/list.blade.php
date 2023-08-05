@extends('bk.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
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
    <div class="container">

        {{-- Modal --}}
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tambah Tata Tertib
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambahkan Tata Tertib</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/bk-tartib" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="Kategori">Kategori</label>
                                    <div class="col-sm-9">
                                        <select name="kategori" id="Kategori" class="form-select">
                                            <option value="Sikap Perilaku">Sikap Perilaku</option>
                                            <option value="Kerajinan">Kerajinan</option>
                                            <option value="Kerapian">Kerapian</option>
                                        </select>
                                        @error('kategori')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="JenisPelanggaran">Jenis Pelanggaran</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('jenis_pelanggaran') is-invalid @enderror"
                                            id="JenisPelanggaran" placeholder="Ex : Datang Terlambat"
                                            name="jenis_pelanggaran" value="{{ old('jenis_pelanggaran') }}">
                                        @error('jenis_pelanggaran')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="Poin">Poin</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control @error('poin') is-invalid @enderror"
                                            name="poin">
                                        @error('poin')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
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
                    <th>Kategori</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tartib as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->kategori }}</td>
                        <td>{{ $t->jenis_pelanggaran }}</td>
                        <td>{{ $t->poin }}</td>
                        <td>
                            <a href="/bk-tartib/{{ $t->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/bk-tartib/{{ $t->id }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
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
