@extends('master')

@section('content')
    <div class="container p-5">
        <h2>Edit Bookmark</h2>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('bookmark.update', ['bookmark' => $bookmark->id])}}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input id="url" type="text" name="url" class="form-control" value={{$bookmark->url}}>
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description"  name="description" class="form-control">{{$bookmark->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>/
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent-category">Category</label>
                        <select id="parent-category" class="form-control" name="category_id">
                            @foreach($category_list as $category)
                                @if($category->id == $bookmark->category_id)
                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@stop

