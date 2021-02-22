<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    function generateBladeCategoryStructure($parent_id = 0): string
    {
        // Define a default value for $html
        $html = '';

        // Loop through the results
        foreach($this->getCategoryList() as $row) {

            // If the current records parent ID equals the requested
            // parent ID...
            if((int)$row->parent_id == (int)$parent_id){

                // Add an <li> element
                $html .= '<li class="list-group-item cursor-pointer" data-category-id="' . $row->id . '">';
                $html .= '<a href="#">';
                $html .= $row->name;
                $html .= view('category.badges', ['category' => $row->id])->render();

                // Before closing the <li>, check for any children
                // If this record does have children, generate a new
                // <ul> element, and recall this function with a new
                // parent ID
                if($this->countChildren($row->parent_id > 0)){
                    $html .= '<ul class="list-group">';
                    $html .= $this->generateBladeCategoryStructure($row->id);
                    $html .= '</ul>';
                }

                // Now close the <li>
                $html .= '</a></li>';
            }
        }

        // Return the generated HTML
        return $html;
    }

    /**
     * Count child for a certain category
     *
     * @param int $parent_id
     * @return int
     */
    function countChildren($parent_id = 0): int
    {
        // Set a default value to return. By default
        // Say this element has 0 children
        $childCount = 0;

        // Loop through each of the results
        foreach($this::all() as $row){

            // If the current records parent ID is the same
            // as the supplied parent ID, add 1 to the child
            // count
            if((int)$row['parent_id']===(int)$parent_id) {
                $childCount += 1;
            }
        }

        // Return the number of children
        return $childCount;
    }

    /**
     * Get all category list
     *
     * @return array
     */
    function getCategoryList(): array
    {
        return DB::table('categories')->get()->all();
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
