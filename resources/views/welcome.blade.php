@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    <div style="text-align: center">
                        <h3>Go to</h3>
                        <button onclick="window.location.href='{{ route('category.index') }}'" type="button" class="btn btn-primary">Category</button>
                        <button onclick="window.location.href='{{ route('post.index') }}'" type="button" class="btn btn-primary">Post</button>
                        <br><br>
                        <!-- Authentication Links -->
                        @guest
                            <h3>Login or Register to mess with Post</h3>
                            <button type="button" onclick="window.location.href='{{ route('login') }}'" class="btn btn-primary">Login</button>
                            <button type="button" onclick="window.location.href='{{ route('register') }}'" class="btn btn-primary">Register</button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection