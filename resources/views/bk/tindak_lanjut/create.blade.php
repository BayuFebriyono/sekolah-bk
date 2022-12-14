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
                    <form action="/tindak-lanjut" method="POST">
                        @csrf
                        <input type="hidden" name="rekaman_tata_tertib_id" value="{{ $rekaman->id }}">


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="TIndakLanjut">Tindak Lanjut</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tindak_lanjut') is-invalid @enderror"
                                    id="TIndakLanjut" placeholder="Ex : Panggilan Orang tua" name="tindak_lanjut"
                                    value="{{ old('tindak_lanjut') }}">
                                @error('tindak_lanjut')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="hasil">Hasil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('hasil') is-invalid @enderror"
                                    id="hasil" placeholder="Ex : Murid Jera" name="hasil" value="{{ old('hasil') }}">
                                @error('hasil')
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
