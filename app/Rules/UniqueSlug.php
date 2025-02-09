<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\article;

class UniqueSlug implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $article = Article::where('slug', $_POST['blog_slug'])->pluck('id');

        $blog_id = @$article[0];

        if (empty($article[0])) {
            return true;
        } else {
            if ($_POST['blog_id'] == $blog_id) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Choose Unique Slug';
    }
}
