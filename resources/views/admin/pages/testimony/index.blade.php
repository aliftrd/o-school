@extends('layouts.app')

@section('content-title', 'Portfolio')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row d-flex justify-content-end pb-4">
                <a href="{{ route('testimonies.create') }}" class="btn btn-primary btn-sm">Tambah</a>
            </div>
            <div class="row">
                @forelse ($testimonies as $testimony)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . $testimony->images) }}" alt="image" class="rounded-circle" style="width: 100px;height: 100px;object-fit: cover;">
                            <div class="pl-3 pr-3 pt-3">
                                <h6>{{ $testimony->name }}</h6>
                                <span class="badge badge-primary">{{ $testimony->profession }}</span>
                                <p class="pt-2 text-small">{{ Str::limit($testimony->message, 32) }}</p>
                                <div class="row pl-1 pr-1 d-flex justify-content-end">
                                    <a href="{{ route('testimonies.edit', $testimony->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('testimonies.destroy', $testimony->id) }}" method="post" class="ml-2 d-inline" onsubmit="event.preventDefault();let r = confirm('Anda yakin? semua data yang telah dihapus tidak akan bisa dikembalikan!');if(r === true) { return this.submit() }">
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
                {{ $testimonies->links() }}
            </div>
        </div>
    </div>
</div>
@endsection