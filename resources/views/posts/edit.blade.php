@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', $post) }}">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            <div class="error">
                                @foreach($errors->all() as $message)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="category_id">Category * </label>
                                <select class="form-control" name="category_id" require>
                                    <option></option>
                                    @foreach($datas as $data)
                                        <option value="{{$data->id}}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="title">Title * </label>
                                <input type="text" class="form-control" name="title" id="title" required value="@if(isset($post)){{$post->title}}@endif" />
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="author">Author </label>
                                <input type="text" class="form-control" name="author" id="author" value="@if(isset($post)){{ $post->author}}@endif" />
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" id="content"></textarea>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
