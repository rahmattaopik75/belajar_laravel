@extends('template_blog.content')

@section('isi')

    @foreach($data as $isi_post)
    <div class = "section-row">
    <figure>
    <img src="{{ asset($isi_post->gambar) }}" class="img-fluid" alt="">
    </figure>
    <h3>{{$isi_post->judul}}</h3>
    <p>{{ $isi_post->content}}</p>
    <div class="post-tags">
        <ul>
            <li>Tag:</li>
            @foreach($isi_post->tags as $tag)
            <li>
            <a href="#">{{ $tag->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    </div>
						
    @endforeach

@endsection