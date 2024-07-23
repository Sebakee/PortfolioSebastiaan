@extends('layout')
@action('content')
<div class="container">


<div class="card">
    <div class="card-heaeder"> register form</div>
    <div class="card-body">
        <form action="{{ route('admin.register')}}" method="POST">
            {!! csrf_field() !!}
            <label for="">First name</label>
            <input type="text" name="name" id="name" class="form-control"> <br>
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control"> <br>
            <label for="">Password</label>
            <input type="password" name="password" name="password" class="form-control"><br>

            <input type="submit" value="'save" class="btn btn-success">
        </form>
    </div>
</div>
</div>

@stop