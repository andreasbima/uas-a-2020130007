@extends('layouts.master')
@section('title', $menu->nama)
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $menu->nama }}</h2>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary ml-3">Edit</a>

                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                {{ $menu->harga }}
            </span>
        </h5>
        <p>
            Rekomendasi :
        @if ($menu->rekomendasi == 1)
            yes
        @else
            no
        @endif
        </p>

    </div>
@endsection
