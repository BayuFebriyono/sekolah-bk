@extends('bk.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="{{ asset('dselect/css/dselect.min.css') }}">
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
                Tambah Rekaman Pelanggaran
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Tambahkan Rekaman Pelanggaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/rekaman-tartib" method="POST">
                            @csrf
                            <div class="modal-body">

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="NoPelanggaran">No Pelanggaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_pelanggaran" id="NoPelanggaran" class="form-control"
                                            value="{{ $no }}" readonly>
                                        @error('no_pelanggaran')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="TahunPelajaran">Tahun Pelajaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tahun_pelajaran" id="TahunPelajaran"
                                            class="form-control" value="{{ getAcademicYear(now()) }}" readonly>
                                        @error('tahun_pelajaran')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="Tanggal">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            name="tanggal">
                                        @error('tanggal')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}

                                {{-- Siswa --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="Tartib">Siswa</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <select class="form-control" id="selectWalas" name="siswa_id">
                                                    @foreach ($siswa as $g)
                                                        <option value="{{ $g->id }}">
                                                            {{ $g->nomor_induk . ' - ' . $g->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Jenis Pelanggaran --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="Tartib">Jenis Pelanggaran</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <select class="form-control" id="selectWalas" name="tata_tertib_id">
                                                    @foreach ($tata_tertib as $g)
                                                        <option value="{{ $g->id }}">{{ $g->jenis_pelanggaran }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                    <th>No Pelanggaran </th>
                    <th>Tahun Pelajaran</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Pelanggaran</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rek as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->no_pelanggaran }}</td>
                        <td>{{ $r->tahun_pelajaran }}</td>
                        <td>{{ $r->guru->nama }}</td>
                        <td>{{ $r->siswa->wargaKelas->kelas->nama_kelas }}</td>
                        <td>{{ $r->siswa->nama }}</td>
                        <td>{{ $r->tataTertib->jenis_pelanggaran }}</td>
                        <td>{{ $r->tataTertib->poin }}</td>
                        <td>
                            <a href="/rekaman-tartib/{{ $r->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="/rekaman-tartib/{{ $r->id }}" class="d-inline" method="POST">
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

    <script src="{{ asset('dselect/js/dselect.min.js') }}"></script>
    <script>
        dselect(document.querySelector('#selectWalas'), {
            search: true
        })
        dselect(document.querySelector('#Kelas'), {
            search: true
        })
    </script>
@endsection
