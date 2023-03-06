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
                    <h4 class="card-title">Edit Buku</h4>
                    <h6 class="card-subtitle">Edit Data Buku Dengan Benar : </a>
                    </h6>
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('buku.update', $buku->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ $buku->judul }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input id="pengarang" type="text"
                                    class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                                    value="{{ $buku->pengarang }}" required autocomplete="pengarang">

                                @error('pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input id="penerbit" type="text"
                                    class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                                    value="{{ $buku->penerbit }}" required autocomplete="penerbit">

                                @error('penerbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_terbit">Tanggal Terbit</label>
                                <input id="tanggal_terbit" type="date"
                                    class="form-control @error('tanggal_terbit') is-invalid @enderror"
                                    name="tanggal_terbit" value="{{ $buku->tanggal_terbit }}" required
                                    autocomplete="tanggal_terbit">

                                @error('tanggal_terbit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"
                                    rows="5">{{ $buku->deskripsi }}</textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">


                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            </br>
                            <button type="submit" class="btn btn-primary">Update Buku</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection