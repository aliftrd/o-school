@extends('layouts.app')

@section('content-title', 'Portfolio Category')

@section('content-body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('portfolio.category.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i> Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Filter</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{ route('portfolio.category.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('portfolio.category.destroy', $category->id) }}" method="post" class="d-inline" onsubmit="event.preventDefault();let r = confirm('Anda yakin? semua data yang telah dihapus tidak akan bisa dikembalikan!');if(r === true) { return this.submit() }">@csrf @method('DELETE') <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
