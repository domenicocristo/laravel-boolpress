@extends('layouts.main-layout')
@section('content')
    <section>
        <h1>Details Post</h1>
        <h2>Author - {{ $post -> author }}</h2>
        <img src="{{ $post -> img }}" alt="img">
        <h4>Title - {{ $post -> title }}</h4>
        <h5>Category - {{ $post -> category -> name }}</h5>
        <h5>Tags - 
            @foreach ($post -> tags as $tag)
                {{ $tag -> name }}
            @endforeach
        </h5>
        <h5>date - {{ $post -> date }}</h5>
        <a href="{{url('/')}}">BACK TO HOME</a>
    </section>
@endsection