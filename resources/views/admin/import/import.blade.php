@extends('admin.main.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Import Data Siswa</h4>
                <p>Import data siswa dalam file excel. Gunakan format yang bisa dibaca program. Untuk contoh Format bisa di
                    download dibawah.</p>
                <a href="" class="btn btn-primary mb-4">Download</a>
                <form action="">
                    <input type="file" class="form-control" name="import">
                    <button type="submit" class="btn btn-primary mt-3">Import</button>
                </form>
            </div>
        </div>
    </div>
@endsection
