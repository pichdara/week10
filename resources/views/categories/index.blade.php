@extends('layouts.app')

@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Categories</h1>    
            <div>
                <a style="margin: 19px;" href="{{ route('category.create')}}" class="btn btn-primary">Add New Category</a>
            </div>  
            @include('categories.includes.table')
        <div>
    </div>
@endsection