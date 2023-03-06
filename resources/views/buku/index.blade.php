@extends('layouts.admin')

@section('content')

<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-11 mb-3 mr-3">
                            <form action="{{ route('buku.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Buku Apa Nichh...."
                                        name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary ml-10" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <h4 class="card-title">Daftar Buku</h4>
                    <h6 class="card-subtitle">Berikut Daftar Buku Yang Ada : </a>
                    </h6>
                    <div class="table-responsive">
                        <table class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $key => $buku)
                                <tr>
                                    <td>{{ ($bukus->currentPage()-1) * $bukus->perPage() + $loop->iteration }}</td>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->pengarang }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>
                                        <a href="{{ route('buku.edit', $buku->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('buku.show', $buku->id) }}"
                                            class="btn btn-info btn-sm">Show</a>

                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection