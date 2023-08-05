@extends('bk.main.main')
@section('content')
    <div class="container">
        <div class="col-xxl">


            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Data Tartib</h5>
                </div>
                <div class="card-body">
                    <form action="/bk-tartib/{{ $tartib->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="Kategori">Kategori</label>
                            <div class="col-sm-9">
                                <select name="kategori" id="Kategori" class="form-select" required>
                                    <option value="Sikap Perilaku" {{ $tartib->kategori == 'Sikap Perilaku' ? 'selected' : '' }}>Sikap Perilaku</option>
                                    <option value="Kerajinan" {{ $tartib->kategori == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                    <option value="Kerapian" {{ $tartib->kategori == 'Kerapian' ? 'selected' : '' }}>Kerapian</option>
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
                                    name="jenis_pelanggaran" value="{{ old('jenis_pelanggaran') ?? $tartib->jenis_pelanggaran }}">
                                @error('jenis_pelanggaran')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label" for="Poin">Poin</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('poin') is-invalid @enderror"
                                    name="poin" value="{{ old('poin') ?? $tartib->poin }}">
                                @error('poin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
