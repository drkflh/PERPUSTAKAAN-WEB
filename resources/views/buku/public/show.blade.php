@extends('layouts.guest')

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Detail Buku {{ $buku->judul }}</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Berikut Detail Dari Buku {{ $buku->judul }} :</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="product-wrap">
            <div class="product-detail-wrap mb-30">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-slider slider-arrow">
                            <div class="product-slide">
                                <img src="{{Storage::url($buku->image)}}" alt="{{ $buku->judul }}"
                                    class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="product-detail-desc pd-20 card-box height-100-p">
                            <h4 class="mb-20 pt-20">{{ $buku->judul }}</h4>
                            <p>
                                <strong>Pengarang :</strong> <br> {{ $buku->pengarang }}
                            </p>
                            <p>
                                <strong>Penerbit :</strong> <br>{{ $buku->penerbit }}
                            </p>
                            <p>
                                <strong>Tanggal Terbit</strong>
                                <br>{{ date('d M Y', strtotime($buku->tanggal_terbit)) }}
                            </p>
                            <p>
                                <strong>Deskripsi</strong> <br> {{ $buku->deskripsi}}
                            </p>
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <a href="/" class="btn btn-outline-primary btn-block">Kembali</a>
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