<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CustomRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $fail('deu ruim');
    }
}

/*pode trocar a propriedade pelo método
    protected array $rules = [
        'name' => ['required', 'min:3', 'max:255'],
        'email'=> ['required', 'email', 'max:255', new CustomRule()],
    ]; */
