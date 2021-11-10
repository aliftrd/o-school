@extends('layouts.app')

@section('content-title', 'Setting')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('setting.update') }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-3"><strong>Site</strong></div>
                            <div class="col-md-9"><hr></div>
                        </div>
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" value="{{ $setting['title'] }}" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" value="{{ $setting['description'] }}" required>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keyword">Keyword</label>
                            <input type="text" class="form-control @error('keyword') is-invalid @enderror"
                                name="keyword" id="keyword" value="{{ $setting['keyword'] }}" required>
                            @error('keyword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3"><strong>Hero</strong></div>
                            <div class="col-md-9"><hr></div>
                        </div>
                        <div class="form-group">
                            <label for="hero_text_header">Hero Header</label>
                            <input type="text" class="form-control @error('hero_text_header') is-invalid @enderror"
                                name="hero_text_header" id="hero_text_header" value="{{ $setting['hero_text_header'] }}" required>
                            @error('hero_text_header')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="hero_text_description">Hero Deskripsi</label>
                            <input type="text" class="form-control @error('hero_text_description') is-invalid @enderror"
                                name="hero_text_description" id="hero_text_description" value="{{ $setting['hero_text_description'] }}" required>
                            @error('hero_text_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3"><strong>Portfolio</strong></div>
                            <div class="col-md-9"><hr></div>
                        </div>
                        <div class="form-group">
                            <label for="portfolio_text_description">Portfolio Deskripsi</label>
                            <input type="text" class="form-control @error('portfolio_text_description') is-invalid @enderror"
                                name="portfolio_text_description" id="portfolio_text_description" value="{{ $setting['portfolio_text_description'] }}" required>
                            @error('hero_text_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3"><strong>Gallery</strong></div>
                            <div class="col-md-9"><hr></div>
                        </div>
                        <div class="form-group">
                            <label for="gallery_text_description">Gallery Deskripsi</label>
                            <input type="text" class="form-control @error('gallery_text_description') is-invalid @enderror"
                                name="gallery_text_description" id="gallery_text_description" value="{{ $setting['gallery_text_description'] }}" required>
                            @error('gallery_text_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary"> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
