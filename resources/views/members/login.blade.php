@extends('master')

@section('content')

    @if(session()->get('success'))
        <p class="text-center alert alert-success mt-3">
            {{ session()->get('success') }} 
        </p>
    @endif

    @if(session()->get('error'))
        <p class="text-center alert alert-danger mt-3">
            {{ session()->get('error') }} 
        </p>
    @endif

    <h1 class="m-5 text-center"> Login Panel </h1>

    <form action="{{ route('check') }}" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <center>
            <button type="submit" class="p-2 btn btn-primary">Login</button>
        </center>
    </form>

    <p class="mt-3 text-center">Are You New Here? <a href="{{ route('registration') }}">Sign Up</a></p>
@endsection