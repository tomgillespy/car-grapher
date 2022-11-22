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
              $qs = parse_url($this->url, PHP_URL_QUERY);
              if (!$qs) {
                $fail('No Car Information found in URL');
              }
              $params = [];
              parse_str($qs, $params);
              if (empty($params['make'])) {
                $fail('Please specify a make in the search box');
              }
              if (empty($params['model'])) {
                $fail('Please specify a model in the search box');
              }
            }],
        ];
    }

    public function messages()
    {
        return [
            'url.required' => 'Please submit a URL',
        ];
    }
}
