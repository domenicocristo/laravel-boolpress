@extends('layouts.main-layout')
@section('content')
    
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="POST">
        @method('POST')
        @csrf

        <label for="author">Author:</label>
        <input type="text" name="author" placeholder="author"><br>

        <label for="img">Image:</label>
        <input type="text" name="img" value="https://picsum.photos/400/300"><br>

        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title"><br>

        <label for="date">Date:</label>
        <input type="date" name="date"><br>

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <br>
        
        <input type="submit" value="CREATE"><br>

        <a href="{{url('/')}}">BACK TO HOME</a>
    </form>
@endsection