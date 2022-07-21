@extends('layouts.blog')

@section('nav_menu')
{{-- Menú de navegación --}}
    @include('blog.blog-nav')
@endsection

@section('content_page')
    <style>
        .image-wrapper img {
            width: 25%;
            height: 25%;
        }
    </style>
    
    <div class="card text-center">
        <div class="card-header">
            {{ $post->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{!! $post->extract !!}</h5>
            <div class="image-wrapper">
                <img src="{{asset('storage').'/'.$post->image}}" alt="image" class="img-thumnail" height="100" width="100">
                <br>
                <small><strong>Categoría: </strong>{{$post->category->name}}</small>
            </div>
            <p>{!!$post->body!!}</p>
            <small><strong>Autor:</strong> {{$post->user->name}} - {{$post->user->rol}}</small>
            <br>
            <a class="btn btn-secondary btn-sm" href="{{route('blog.index')}}">Regresar</a>
        </div>
        <div class="card-footer text-muted">
            {{ $post->created_at->isoFormat('LLLL') }}
        </div>
        
    </div>
@endsection