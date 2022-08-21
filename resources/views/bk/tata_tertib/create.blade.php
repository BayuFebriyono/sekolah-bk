@extends('bk.main.main')
@section('content')
    <div class="container">
        <div class="col-xxl">

            <div class="bs-toast toast toast-placement-ex m-2 fade bg-primary position-fixed bottom-0 end-0 p-3 {{ session('success') ? 'show' : 'hide' }}"
                role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Suksess</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">Data berhasil ditambahkan</div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Data Tartib</h5>
                </div>
                <div class="card-body">
                    <form action="/bk-tartib" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Tartib">Tata Tertib</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tata_tertib') is-invalid @enderror"
                                    id="Tartib" placeholder="Ex : Datang Terlambat" name="tata_tertib"
                                    value="{{ old('tata_tertib') }}">
                                @error('tata_tertib')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="Poin">Poin</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('poin') is-invalid @enderror"
                                    id="Poin" placeholder="Ex : 100" name="poin" value="{{ old('poin') }}">
                                @error('poin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tindakan">Tindakan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tindakan') is-invalid @enderror"
                                    id="tindakan" placeholder="Ex : Panggilan Orang Tua" name="tindakan"
                                    value="{{ old('tindakan') }}">
                                @error('tindakan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
