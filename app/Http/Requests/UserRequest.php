<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
  public function attributes() {
    return [
      'firstname' => 'first name',
      'lastname'  => 'full name',
      'email'     => 'email address',
      // 'password' => 'password',
    ];
  }

  public function authorize() {
    return true; // You can implement authorization logic here
  }

  public function rules() {
    dump('UserRequest->rules()');
    return [
      // 'firstname' => 'required|string|max:255',
      // 'lastname' => 'required|string|max:255',
      // 'email' => 'required|string|email|max:255|unique:users',
      // 'password' => 'required|string|min:8',
    ];
  }
}
