@extends('admin.main.main')
@section('content')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Data Siswa</h5>
            </div>
            <div class="card-body">
                <form>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="TahunMasuk">Tahun Masuk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="TahunMasuk" placeholder="Ex : 2021/2022"
                                name="tahun_masuk">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="NomorInduk">Nomor Induk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="NomorInduk" placeholder="Ex : 087654">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="Nama">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Nama" placeholder="Ex : Burhanudin">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Alamat</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control"
                                placeholder="Ex : Dsn Jasem RT 05 Rw 02 Kec.Ngoro Kab. Mojokerto"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-check mt-3">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="L"
                                    id="defaultRadio1">
                                <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                            </div>
                            <div class="form-check">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="P"
                                    id="defaultRadio2" checked="">
                                <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                            </div>
                        </div>

                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                        <div class="col-sm-10">
                            <input type="text" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                        <div class="col-sm-10">
                            <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"
                                aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
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
@endsection
