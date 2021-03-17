<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookmarkCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' =>[
                'required',
                'url',
                function ($attribute, $value, $fail) {
                    $userHasBookmark =
                        DB::table('bookmarks')
                            ->where('url', '=', $value)
                            ->where('user_id', '=', Auth::id())
                            ->exists();

                    if ( $userHasBookmark ) {
                        $fail('User already has such url in bookmark list.');
                    }
                },
            ],
            'description' => 'max:300',
            'category_id' => 'numeric|required',
            'user_id' => 'required',
        ];
    }
}
