@extends('layouts.app')

@section('content-title', 'Portfolio')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-sm ml-auto"> Kembali</a>
                </div>
                <div class="card-body">
                    @isset($project)
                    <form action="{{ route('portfolio.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <input type="hidden" name="oldImage" value="{{ $project->images }}">
                        @else
                        <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                            @endisset
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="@isset($project){{ $project->title }}@else{{ old('judul') }}@endisset"
                                    required>
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror">@isset($project){{ $project->description }}@else{{ old('deskripsi') }}@endisset</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(isset($project) && $project->
                                        project_category_id == $category->id) selected @endisset @if(old('kategori') ==
                                        $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Preview</label>
                                        <img @isset($project) src="{{ asset('storage/' . $project->images) }}"
                                            alt="Preview Image" @endisset class="img-preview img-fluid d-block" width="100%">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="images">Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('image') is-invalid @enderror"
                                                    name="image" id="image" onchange="inputFile()" accept="image/*">>
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <p class="text-mute text-small" style="margin-top: -16px">Max file 1Mb</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm">@isset($project) Simpan @else Tambah
                                @endisset</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="application/javascript">
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    function inputFile() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])
        oFReader.onload = function (OFREvent) {
            imgPreview.src = OFREvent.target.result
        }
    }

</script>
@endsection
