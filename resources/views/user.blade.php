<div class="row">
    <div class="col-sm">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            <strong></strong>
        </div>
        <div class="alert alert-danger alert-dismissible fade show  d-none" role="alert">
            <strong></strong>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('category.create')  }}" type="button" class="btn btn-primary btn-sm float-left">
                    {{ __("Add Category") }}
                </a>
            </div>
            <div class="col-4">
                <span>{{ Auth::user()->name }}</span>
                <span> / </span>
                <a class="center" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="col-4">
                <a href="{{ route('bookmark.create')  }}" type="button" class="btn btn-primary btn-sm float-right">
                    {{ __("Add Bookmark") }}
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <ul class="list-group category-list">
            {!! $category_blade_structure !!}
        </ul>
    </div>
    <div class="col-sm">
        <div id="bookmark-wrapper" class="table table-responsive">
        </div>
    </div>
</div>
