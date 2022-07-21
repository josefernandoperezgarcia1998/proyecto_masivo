@extends('layouts.general')

@push('css')

@endpush

@section('title_page','Crear categoría')

@section('content_page')
<div class="container shadow p-3 mb-5 bg-body rounded">
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Categoría</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name') }}" autocomplete="off">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"
                value="{{ old('slug') }}" autocomplete="off" readonly>
                @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection

@push('js')
<script src="{{asset('assets/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
        $('#name').stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@endpush
