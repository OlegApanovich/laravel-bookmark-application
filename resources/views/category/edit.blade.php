@extends('master')

@section('content')
    <div class="container p-5">
        <h2>Edit Category</h2>
        <div class="row">
            <form method="post" action="{{route('category.update', ['category' => $category->id])}}">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" value="{{ $category->name  }}" name="name" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="parent-category">Parent Category</label>
                    <select id="parent-category" class="form-control" name="parent_id">
                        @foreach($category_list as $categoryEntity)
                            @if($category->id == $categoryEntity->id)
                                @php
                                    continue;
                                @endphp
                            @endif

                            @if($categoryEntity->id == $category->parent_id)
                                <option selected value="{{$categoryEntity->id}}">
                                    {{$categoryEntity->name}}
                                </option>
                            @else
                                <option value="{{$categoryEntity->id}}">
                                    {{$categoryEntity->name}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('parent_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop

