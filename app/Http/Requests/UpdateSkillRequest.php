<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'min:3', 'max:255'],
      'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
    ];
  }
}