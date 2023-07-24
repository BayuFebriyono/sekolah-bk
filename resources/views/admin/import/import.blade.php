@extends('admin.main.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Import Data Siswa</h4>
                <p>Import data siswa dalam file excel. Gunakan format yang bisa dibaca program. Untuk contoh Format bisa di
                    download dibawah.</p>
                <a href="{{ asset('excel/Import Siswa.xlsx') }}" class="btn btn-primary mb-4">Download</a>
                <form action="/admin-import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control" name="excel" required>
                    <button type="submit" class="btn btn-primary mt-3" id="submitSiswa" onclick="addLoading()">
                        Import
                        <i class="fas fa-spinner fa-spin" style="display:none;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('add-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        function addLoading() {
            $(".btn .fa-spinner").show();
        }
    </script>
@endsection
