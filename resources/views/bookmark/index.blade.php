<table class="table table-hover">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Description</th>
        <th scope="col">URL</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookmarksCollection as $bookmark)
        <tr data-bookmark-id="{{$bookmark->id}}">
            <th scope="row">
                <a href="#" class="badge badge-danger badge-pill float-right mt-1 mr-1">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                </a>
                <a href="{{route('bookmark.edit', compact('bookmark'))}}" class="badge badge-primary badge-pill float-right mt-1 mr-1">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </th>
            <td>{{$bookmark->description}}</td>
            <td>{{$bookmark->url}}</td>
        </tr>
    </tbody>
    @endforeach
</table>
