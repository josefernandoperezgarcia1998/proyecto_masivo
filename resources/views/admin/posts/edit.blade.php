@extends('layouts.general')

@push('css')
<style>
    .image-wrapper img {
        width: 100%;
        height: 100%;
    }
</style>
@endpush

@section('title_page','Editar post')

@section('content_page')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="container shadow p-3 mb-5 bg-body rounded">
    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Nombre post</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('name', $post->name) }}" autocomplete="off" placeholder="Ingrese el nombre del post">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"
                value="{{ old('slug', $post->slug) }}" autocomplete="off" readonly>
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Categoría</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="" selected>Selecciona una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($post->category_id === $category->id || old('category_id') ===
                        $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="image" class="form-label">Imagen</label>
                    <input class="form-control" id="image" placeholder="" type="file" name="image">
                </div>
                <div class="col">
                    <div class="image-wrapper">
                        <img id="image_preview" class="img-thumbnail" src="{{asset('storage').'/'.$post->image}}" alt="imagen">
                    </div>
                </div>
            </div>
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="extract" class="form-label">Extracto</label>
            <textarea class="form-control" name="extract" id="extract" cols="30" rows="10">{!!old('extract', $post->extract )!!}</textarea>
                @error('extract')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Cuerpo del post</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{!!old('body', $post->body )!!}</textarea>
                @error('body')
                    <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Estado</label>
            <select class="form-control" name="status" >
                    <option value="" selected>Selecciona el estado</option>
                    <option {{ old('status') == 'Yes' ? 'selected' : ($post->status == 'Yes' ? 'selected' : '') }} value="Yes">Si</option>
                    <option {{ old('status') == 'No' ? 'selected' : ($post->status == 'No' ? 'selected' : '') }} value="No">No</option>
            </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
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

{{-- Sript para Tiny Editor --}}
<script src="https://cdn.tiny.cloud/1/uemybo7vcmvlukd1pi1rot1vv0tb595tjbjnhmyz9crd29s3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#extract'
    })
    tinymce.init({
        selector: 'textarea#body'
    })
</script>

{{-- Preview de la imagen --}}
<script>
$(document).ready(function(){
        $('#image').change(function(e){
            let file= e.target.files[0];
            let reader= new FileReader();
            reader.onload= (event) => {
            $('#image_preview').attr('src', event.target.result)
        };
        reader.readAsDataURL(file);
    })
});
</script>
@endpush
