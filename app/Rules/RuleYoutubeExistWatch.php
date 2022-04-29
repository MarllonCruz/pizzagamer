<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RuleYoutubeExistWatch implements Rule
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
        return (bool) strpos($value, 'watch?v=');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Link do video no youtube invalido 2';
    }
}
