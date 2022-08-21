@extends('bk.main.main')

@section('add-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tata Tertib</th>
                    <th>Poin</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tartib as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t->tata_tertib }}</td>
                        <td>{{ $t->poin }}</td>
                        <td>{{ $t->tindakan }}</td>
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
