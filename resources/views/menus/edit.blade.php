@extends('layouts.master')
@section('title', 'Edit Menu')
@section('content')
    <h2>Update New Menu</h2>
    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama">Nama Menu</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') ?? $menu->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Rekomendasi</label>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="rekomendasi" id="yes" value="1"
                        {{ old('rekomendasi') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="yes">Yes</label>
                </label>
            </div>

            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="rekomendasi" id="no" value="0"
                        {{ old('rekomendasi') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="no">No</label>
                </label>
            </div>

            @error('rekomendasi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="genre">Harga</label>
                <input type="number" step="0.2" class="form-control @error('harga') is-invalid @enderror"
                    name="harga" id="harga" min="0" max="99000000"
                    value="{{ old('harga') ?? $menu->harga }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
    </form>
@endsection
