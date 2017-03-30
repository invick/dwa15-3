@extends('main')

@section('content')

    <div class="header">
        <div class="container text-center">
            <h3>Generate your password</h3>
        </div>
    </div>

    <div class="errors">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-3 col-sm-6">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="generator">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <form class="form-horizontal" action="{{ route('generate') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Length *</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="length" id="length" placeholder="Enter length of password" value="{{ old('length') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Charset *</label>
                            <div class="col-sm-8">
                                <select id="charset" name="charset" class="form-control">
                                    <option disabled selected>Select charset</option>
                                    <option value="lower" {{ old('charset') == 'lower' ? 'checked' : '' }}>Lower case (a-z)</option>
                                    <option value="upper" {{ old('charset') == 'upper' ? 'checked' : '' }}>Upper case (A-Z)</option>
                                    <option value="lower_and_upper" {{ old('charset') == 'lower_and_upper' ? 'checked' : '' }}>Lower and upper case (a-z & A-Z)</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="numerals" {{ old('numerals') ? 'checked' : '' }}> Use numerals (0-9)</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="specials" {{ old('special') ? 'checked' : '' }}> Use special characters (!?~@#-_+<>[]{})</label>
                                </div>
                                <br>
                                <small>* fields required</small>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection