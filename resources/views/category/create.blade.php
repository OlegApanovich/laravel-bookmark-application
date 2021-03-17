@extends('master')

@section('content')
    <div class="container p-5">
        <h2>Add Category</h2>
        <div class="row">
            <form method="post" action="{{ route('category.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="parent-category">Parent Category</label>
                    <select id="parent-category" class="form-control" name="parent_id">
                        <option value="">Parent Category</option>
                        @foreach($category_list as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@stop

