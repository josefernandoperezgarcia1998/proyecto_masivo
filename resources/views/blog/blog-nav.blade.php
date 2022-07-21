<div class="navbar-nav">
    {{-- Menú de navegación --}}
    <a class="nav-link" href="{{route('welcome')}}">Inicio</a>
    <a class="nav-link" href="{{route('blog.index')}}">Blog</a>
    @foreach ($categories as $category)
        <a class="nav-link" href="{{route('posts.category', $category)}}">{{$category->name}}</a>
    @endforeach
</div>