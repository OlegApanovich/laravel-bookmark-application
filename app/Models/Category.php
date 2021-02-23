<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Many to one relation declaration.
     *
     * @return HasMany
     */
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Generate html structure for a main category hierarchy.
     *
     * @param int $parent_id
     * @return string
     */
    public function generateBladeCategoryStructure($parent_id = 0): string
    {
        $list = $this->getCategoryList();

        if ($list->isEmpty()) {
            return "";
        }

        // Define a default value for $html
        $html = '';

        // Loop through the results
        foreach ($list as $category) {
            // If the current records parent ID equals the requested
            // parent ID...
            if ((int)$category->parent_id == (int)$parent_id) {
                $html .= view('category.list-element-start', ['category' => $category])->render();
                $html .= view('category.badges', ['category' => $category->id])->render();

                if ($this->countChild($category->id)) {
                    $html .= view('category.list-start')->render();
                    $html .= $this->generateBladeCategoryStructure($category->id);
                    $html .= view('category.list-end')->render();
                }

                $html .= view('category.list-element-end')->render();
            }
        }

        // Return the generated HTML
        return $html;
    }

    /**
     * Count child categories for a certain category
     *
     * @param $id
     * @return int
     */
    public function countChild($id)
    {
        $childCount = 0;

        foreach ($this::all() as $category) {
            // If the current records parent ID is the same
            // as the supplied parent ID, add 1 to the child
            // count
            if ((int)$category['parent_id'] === (int)$id) {
                $childCount += 1;
            }
        }

        return $childCount;
    }

    /**
     * Get all category list
     *
     * @return Collection
     */
    public function getCategoryList():Collection
    {
        return $this->all();
    }

    /**
     * Get certain category
     *
     * @param integer $categoryId
     * @return mixed
     */
    public function getCategory(int $categoryId)
    {
        return self::find($categoryId);
    }
}
