<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookmarkCreateRequest;
use App\Http\Requests\BookmarkUpdateRequest;
use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class BookmarkController extends Controller
{
    /**
     * @var Category
     */
    public $category;

    /**
     * @var Bookmark
     */
    public $bookmark;

    public function __construct()
    {
        $this->category = new Category;
        $this->bookmark = new Bookmark();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $category = $this->category->getCategory($request->categoryId);

        if ($category->bookmarks->isEmpty()) {
            return response()->json([
                'html' => view('bookmark.empty', ['category' => $category])->render(),
            ]);
        } else {
            return response()->json([
                'html' => view('bookmark.index', ['bookmarksCollection' => $category->bookmarks])->render(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()
            ->view('bookmark.create', [
                'category_list' => $this->category->getCategoryList()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookmarkCreateRequest $request
     * @return RedirectResponse
     */
    public function store(BookmarkCreateRequest $request): RedirectResponse
    {
        $success = Bookmark::create($request->validated());

        if ($success) {
            return redirect()->route('home')->with('success', 'Bookmark Add Success');
        } else {
            return redirect()->route('home')->with('error', 'Bookmark Add Fail Process');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bookmark $bookmark
     * @return Response
     */
    public function edit(Bookmark $bookmark): Response
    {
        return response()
            ->view('bookmark.edit', [
                'bookmark' => $bookmark,
                'category_list' => $this->category->getCategoryList()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookmarkUpdateRequest $request
     * @param integer $id
     * @return RedirectResponse
     */
    public function update(BookmarkUpdateRequest $request, $id): RedirectResponse
    {
        $success = Bookmark::find($id)->update($request->validated());

        if ($success) {
            return redirect()->route('home')->with('success', 'Bookmark Update Success');
        } else {
            return redirect()->route('home')->with('error', 'Bookmark Update Fail Process');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $success = Bookmark::findOrFail($request->id)->delete();

        if ($success) {
            return response()->json(['code'=>200, 'message' => 'Bookmark Delete Success']);
        } else {
            return response()->json(['message' => 'Bookmark Delete Fail Process'], 500);
        }
    }
}
