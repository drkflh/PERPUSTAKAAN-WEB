@extends('layouts.guest')

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Daftar Buku</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Berikut Daftar Buku Yang Tersedia</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{ route('buku.public.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari judul, pengarang, atau penerbit..."
                    name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <div class="product-wrap">
            <div class="product-list">
                <ul class="row">
                    @foreach ($buku as $b)
                    <li class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-box">
                            <div class="producct-img">
                                @if ($b->image)
                                <img src="{{Storage::url($b->image)}}" alt="{{ $b->judul }}"
                                    class="card-img-top img-fluid">

                                @endif
                            </div>
                            <div class="product-caption">
                                <h4><a href="#"> Judul : {{ $b->judul }}
                                    </a></h4>
                                <div class="price"> Pengarang : {{ $b->pengarang }}
                                </div>
                                <a href="{{ route('buku.public.show', $b->id) }}" class="btn btn-outline-primary">Read
                                    More</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="blog-pagination mb-30">
                <div class="btn-toolbar justify-content-center mb-15">
                    <div class="pagination justify-content-center">
                        {{ $buku->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection