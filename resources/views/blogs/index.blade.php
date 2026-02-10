<h1>Blogs</h1>
@foreach($blogs as $blog)
<div>
    <h2>{{ $blog->title }}</h2>
    @if($blog->image)
    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="300">
    @endif
    <p>{{ $blog->content }}</p>
</div>
@endforeach