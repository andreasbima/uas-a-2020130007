@extends('layouts.master')
@section('title', 'Add New Order')
@section('content')
    <h2>Add New Order</h2>
    <form action="{{-- route('menus.store') --}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="idmenu">ID Menu</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    {{-- pattern="[A-Z]{3}\d{3}" --}} value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nama">Nama Menu</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="harga">Harga</label>
                <input type="number" step="0.2" class="form-control @error('harga') is-invalid @enderror"
                    name="harga" id="harga" min="0" max="99000000" value="{{ old('harga') }}">
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="qty">Qty</label>
                <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" id="qty"
                    value="{{ old('qty') }}">
                @error('qty')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status Order</label>
                <select class="form-control form-control-sm" name="status" id="status">
                    <option value="Selesai">Selesai</option>
                    <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
