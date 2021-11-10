@extends('layouts.app')

@section('content-title', 'Portfolio')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('galleries.index') }}" class="btn btn-primary btn-sm ml-auto"> Kembali</a>
                </div>
                <div class="card-body">
                    @isset($gallery)
                    <form action="{{ route('galleries.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        <input type="hidden" name="oldImage" value="{{ $gallery->images }}">
                        @else
                        <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                            @endisset
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Preview</label>
                                        <img @isset($gallery) src="{{ asset('storage/' . $gallery->images) }}"
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
                            <button class="btn btn-primary btn-sm">@isset($gallery) Simpan @else Tambah
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
