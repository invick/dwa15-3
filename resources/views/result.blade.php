@extends('main')

@section('content')

    <div class="header">
        <div class="container text-center">
            <h3>Password generated!</h3>
        </div>
    </div>

    <div class="result">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-3 col-sm-6 text-center">
                    <h5>Your generated password:</h5>
                    <input class="form-control input-lg text-center" type="text" readonly value="{{ $password }}" onClick="this.select();">
                    <br><br>
                    <a href="{{ route('form') }}" class="btn btn-default">Generate one more</a>
                </div>
            </div>
        </div>
    </div>

@endsection