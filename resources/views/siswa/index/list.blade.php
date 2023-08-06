@extends('siswa.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="{{ asset('dselect/css/dselect.min.css') }}">
@endsection

@section('content')
    <div class="bs-toast toast toast-placement-ex m-2 fade bg-primary position-fixed bottom-0 end-0 p-3 {{ session('success') ? 'show' : 'hide' }}"
        role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Suksess</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ session('success') ? session('success') : '' }}</div>
    </div>

    <div class="container mt-3">


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
                    </tr>
                @endforeach
            </tbody>

        </table>
        <p class="text-muted">Total Poin Anda Saat Ini adalah <b>{{ $total_poin }}</b></p>
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
