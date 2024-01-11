<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {


        return [
      "name"=>"required|unique:products|max:255",
      "user_id"=>"required",
      "price"=>"required|integer",
      "category_id"=>"required",
      "serial_number"=>"required|integer",
      "description" => "required|max:255",
      "quantity" => "required|integer",
      "sold" =>"required|boolean",
      "added_cart"=>"nullable"
        ];
    }
}
