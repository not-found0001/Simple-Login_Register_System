@extends('master')

@section('content')
    <h1 class="m-5 text-center"> Registration Panel </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store') }}" method="post">
    {{ csrf_field() }}
        <div class="form-group" >
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Register</button>
        </center>
    </form>
@endsection