@extends('layouts.admin')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Buku</h4>
                    <h6 class="card-subtitle">Isikan Data Buku Dengan Benar : </a>
                    </h6>
                    <div class="table-responsive">
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="{{ old('judul') }}">
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang"
                                    value="{{ old('pengarang') }}">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit"
                                    value="{{ old('penerbit') }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_terbit">Tanggal Terbit</label>
                                <input type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control"
                                    value="{{ old('tanggal_terbit') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"
                                    required>{{ old('deskripsi') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    value="{{ old('image') }}" required>
                            </div>
                            </br>
                            <button type="submit" class="btn btn-primary">Tambah Buku</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection