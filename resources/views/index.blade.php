@php use App\AppController;@endphp

@extends('layouts.master')

@section('title', 'Main Menu')

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

    <div>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Index Page</h2>
                    </div>
                </div>
            </div>
            <p>Welcome to index page, to navigate please choose the menu on the left side !!</p><br>
            <p>Rigt now we have {{-- @dump($menu) --}} item on our menu</p>
            <p>And {{--@dump($menu)--}} total orders</p>
        </div>
    </div>
@endsection
