@extends('layouts.app')

@section('content-title', 'Portfolio Category')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('portfolio.category.index') }}" class="btn btn-primary btn-sm ml-auto"> Kembali</a>
                </div>
                <div class="card-body">
                    @isset($category)
                    <form action="{{ route('portfolio.category.update', $category->id) }}" method="post">
                        @method('PUT')
                        @else
                        <form action="{{ route('portfolio.category.store') }}" method="post">
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('name') is-invalid @enderror" @isset($category)
                                    value="{{ $category->name }}" @endisset>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-sm">@isset($category) Simpan @else Tambah @endisset</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
