<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    public $category;

    public function __construct()
    {
        $this->category = new Category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
//        $role = Role::where('name', 'user')->first();
//        $user = Auth::user();
//        $user->assignRole($role);

        $categoryBladeStructure = $this->category->generateBladeCategoryStructure();

        return response()->view('index', ['category_blade_structure' => $categoryBladeStructure]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()
            ->view('category.create', [
                'category_list' => $this->category->getCategoryList()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $success = Category::create($request->validated());

        if ($success) {
            return redirect()->route('home')->with('success', 'Category Add Success');
        } else {
            return redirect()->route('home')->with('error', 'Category Add Fail Process');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category): Response
    {
        return response()
            ->view('category.edit', [
                'category' => $category,
                'category_list' => $this->category->getCategoryList()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $id): RedirectResponse
    {
        $success = Category::find($id)->update($request->validated());

        if ($success) {
            return redirect()->route('home')->with('success', 'Category Update Success');
        } else {
            return redirect()->route('home')->with('error', 'Category Update Fail Process');
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
        $success = Category::findOrFail($request->id)->delete();

        if ($success) {
            return response()->json(['code'=>200, 'message' => 'Category Delete Success']);
        } else {
            return response()->json(['message' => 'Category Delete Fail Process'], 500);
        }
    }
}
