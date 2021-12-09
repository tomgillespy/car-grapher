<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitURLRequest extends FormRequest
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
            'url' => ['required', function($attr, $val, $fail) {
              if (!str_contains($val, 'autotrader.co.uk/car-search')) {
                $fail('Please submit an autotrader car search url');
              }
              if (!$this->get('make', false)) {
                $fail('Please specify a make in the search box');
              }
              if (!$this->get('model', false)) {
                $fail('Please specify a model in the search box');
              }
            }],
        ];
    }
}
