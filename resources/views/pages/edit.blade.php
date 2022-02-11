@extends('layouts.main-layout')
@section('content')
    
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update', $post->id) }}" method="POST">
        @method('POST')
        @csrf

        <label for="author">Author:</label>
        <input type="text" name="author" placeholder="author" value="{{ $post->author }}"><br>

        <label for="img">Image:</label>
        <input type="text" name="img" value="https://picsum.photos/400/300"><br>

        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title" value="{{ $post->title }}"><br>

        <label for="date">Date:</label>
        <input type="date" name="date" value="{{ $post->date }}"><br>

        <span>Category:</span>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}"
                    @if ($category -> id == $post -> category -> id)
                        selected
                    @endif
                >{{ $category->name }}</option>
            @endforeach
        </select>

        <br>

        <span>Tags:</span><br>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"> 
                @foreach ($post -> tags as $post_tag)
                    @if ($tag -> id == $post_tag -> id)
                        selected
                    @endif
                @endforeach
            {{ $tag->name }} <br>
        @endforeach

        <br>
        
        <input type="submit" value="UPDATE"><br>

        <a href="{{url('/')}}">BACK TO HOME</a>
    </form>
@endsection