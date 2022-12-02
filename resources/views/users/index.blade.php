@extends('layouts.users')
@section('content')
    <div class="row">
        <div class="col-lg-12 mt-3 mb-3">
            <div class="float-left">
                <h2 class="mb-0">Laravel - Lab#1. Ivan Kapitan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New user</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th width="230px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete user №{{ $i }} ({{ $user->email }})?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $users->links() !!}
@endsection
