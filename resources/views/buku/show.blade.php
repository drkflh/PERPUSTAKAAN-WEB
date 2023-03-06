@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Buku {{ $buku->judul }}</h4>
                <h6 class="card-subtitle">Berikut Detail Dari Buku {{ $buku->judul }} : </a>
                </h6>
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">

                                <img src="{{Storage::url($buku->image)}}" alt="{{ $buku->judul }}"
                                    style="max-width: 230px;">

                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" value="{{ $buku->judul }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" class="form-control" id="pengarang"
                                        value="{{ $buku->pengarang }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" id="penerbit" value="{{ $buku->penerbit }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_terbit">Tanggal Terbit</label>
                                    <input type="text" class="form-control" id="tanggal_terbit"
                                        value="{{ $buku->tanggal_terbit}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" readonly
                                        rows="5">{{ $buku->deskripsi }}</textarea>

                                </div>
                                </br>
                                <div class="form-group">
                                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection