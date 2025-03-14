<?php

namespace App\Rules;

use App\Models\Company;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class UniqueRucRule implements ValidationRule
{
    public $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    ;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $company = Company::where('ruc', $value)
            ->where('user_id', $this->user_id)
            ->first();

        if($company){
            $fail('La compañia ya existe ');
        }
    }
}
