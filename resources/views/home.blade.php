@extends('main')

@section('content')

    <!-- Header -->
    <div class="jumbotron v-center">
        <div class="overlay"></div>
        <video class="video-background" preload muted autoplay loop>
            <source src="{{ asset('media/intro.mp4') }}" type="video/mp4">
        </video>
        <div class="container text-center">
            <h1>Hello user!</h1>
            <br>
            <p>Welcome to best password generator app under the sky!</p>
            <p>Click following to generate your save password</p>
            <br>
            <a href="{{ route('form') }}" class="btn btn-lg btn-primary">Generate password</a>
        </div>
    </div>

@endsection