@extends('master')

@section('content')
    <div class="container p-5">
        <h2>Add Bookmark</h2>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('bookmark.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input id="url" type="text" name="url" class="form-control">
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description"  name="description" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent-category">Category</label>
                        <select id="parent-category" class="form-control" name="category_id">
                            @foreach($category_list as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@stop

