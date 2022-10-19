@extends('layouts.users')

@section('content')
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <h2 class="mb-0">Edit User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('users._form')
        <div class="row">
            <!-- Name Field -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                    <span class="help-block text-danger">
                        {{ $errors -> first('name') }}
                    </span>
                </div>
            </div>

            <!-- Email Field -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">

                    <span class="help-block text-danger">
                        {{ $errors -> first('email') }}
                    </span>
                </div>
            </div>

            <!-- Password Field -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password"
                           value="">
                    <span class="help-block text-danger">
                        {{ $errors -> first('password') }}
                    </span>
                </div>
            </div>

            <!-- Password Confirmation Field -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <strong>Password Confirmation:</strong>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password"
                           value="">

                    <span class="help-block text-danger">
                        {{ $errors -> first('password_confirmation') }}
                    </span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
