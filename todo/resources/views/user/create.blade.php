@extends('layouts.app')
@section('title', 'User Registration')
@section('content')

            @if(!$errors->isEmpty())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li> $error </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="mt-5 mb-4">Registration</h1>
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">New User</h5>
                        </div>
                        <div class="card-body">
                        <form  method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="email"  value="{{old('email')}}">
                                    </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection