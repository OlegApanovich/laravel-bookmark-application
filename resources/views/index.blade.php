@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                {{-- page load alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                {{-- ajax alert --}}
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                    <strong></strong>
                </div>
                <div class="alert alert-danger alert-dismissible fade show  d-none" role="alert">
                    <strong></strong>
                </div>
                <a href="{{ route('category.create')  }}" type="button" class="btn btn-primary btn-sm float-left">
                    {{ __("Add Category") }}
                </a>
                <a href="{{ route('bookmark.create')  }}" type="button" class="btn btn-primary btn-sm float-right">
                    Add Bookmark
                </a>
                <div class="clearfix"></div>
                <ul class="list-group category-list">
                    {!! $category_blade_structure !!}
                </ul>
            </div>
            <div class="device-visibility">
                <div class="device-check .d-none d-xs-block d-sm-none" data-device="xs"></div>
                <div class="device-check .d-none d-sm-block d-md-none" data-device="sm"></div>
                <div class="device-check .d-none d-md-block d-lg-none" data-device="md"></div>
                <div class="device-check .d-none d-lg-block" data-device="lg"></div>
            </div>
            <div class="col-sm">
                <div id="bookmark-wrapper" class="table table-responsive">
                </div>
            </div>
        </div>
    </div>
@stop
