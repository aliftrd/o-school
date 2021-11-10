@extends('layouts.app')

@section('content-title', 'Portfolio')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row d-flex justify-content-end pb-4">
                <a href="{{ route('portfolio.create') }}" class="btn btn-primary btn-sm "><i
                    class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="row">
                @forelse ($projects as $project)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <img src="{{ asset('storage/' . $project->images) }}" alt="" class="img-fluid rounded" style="width: 100%;height: 250px;object-fit: cover">
                            <div class="p-3">
                                <h6>{{ $project->title }}</h6>
                                <p class="text-small">{{ Str::limit($project->description, 32) }}</p>
                                <div class="row pl-2 pr-2 d-flex justify-content-end">
                                    <a href="{{ route('portfolio.edit', $project->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('portfolio.destroy', $project->id) }}" method="post" class="ml-2 d-inline" onsubmit="event.preventDefault();let r = confirm('Anda yakin? semua data yang telah dihapus tidak akan bisa dikembalikan!');if(r === true) { return this.submit() }">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">Tidak ada data</div>
                    </div>  
                </div>
                @endforelse
            </div>
            <div class="row d-flex justify-content-end">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
