@section('add-css')
    <link rel="stylesheet" href="{{ asset('dselect/css/dselect.min.css') }}">
@endsection

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
                    <h5 class="mb-0">Tambah Rekaman Tartib</h5>
                </div>
                <div class="card-body">
                    <form action="/rekaman-tartib/{{ $rekaman->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="NoPelanggaran">No Pelanggaran</label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_pelanggaran" id="NoPelanggaran" class="form-control"
                                        value="{{ $rekaman->no_pelanggaran }}" readonly>
                                    @error('no_pelanggaran')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="TahunPelajaran">Tahun Pelajaran</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tahun_pelajaran" id="TahunPelajaran" class="form-control"
                                        value="{{ $rekaman->tahun_pelajaran }}" readonly>
                                    @error('tahun_pelajaran')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            {{-- Siswa --}}
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="Tartib">Siswa</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <select class="form-control" id="selectWalas" name="siswa_id">
                                                @foreach ($siswa as $g)
                                                    <option value="{{ $g->id }}" {{ $g->id == $rekaman->siswa_id ? 'selected' : '' }}>
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
                                                    <option value="{{ $g->id }}" {{ $g->id == $rekaman->tata_tertib_id ? 'selected' : '' }}>{{ $g->jenis_pelanggaran }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('add-script')
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
