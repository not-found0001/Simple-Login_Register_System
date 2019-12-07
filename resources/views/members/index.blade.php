@extends('master')

@section('content')
    <h1 class="m-5 text-center"> Welcome 
        @foreach($member as $val)
            {{ $val->name }}
        @endforeach
    </h1>
    
    <a class="btn btn-info mb-3" href={{ route('logout') }}> 
        Log Out 
    </a>
    

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">name</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($member as $val)
            <tr>
                <td> {{ $val->name }} </td>
                <td> {{ $val->email }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection