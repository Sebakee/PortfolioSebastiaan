@extends('loginlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    You are logged in as an User!
                </div>

                <div class="card-body">
                    <h1> {{ auth()->user()->name }}</h1>
                    <form action="{{ route('admin.logout')}}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection