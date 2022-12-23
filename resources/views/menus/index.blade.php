@extends('layouts.master')

@section('title', 'Menus List')

@push('css_after')
    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>List Menu</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('menus.create') }}" class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                            <span>Tambah Menu Baru</span>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Nama Menu</th>
                        <th>Rekomendasi</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('menus.show', $menu->id) }}">{{ $menu->id }}</a></td>
                            <td>{{ $menu->nama }}</td>
                            <td>{{ $menu->rekomendasi }}</td>
                            <td>{{ $menu->harga }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="6">No data yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
