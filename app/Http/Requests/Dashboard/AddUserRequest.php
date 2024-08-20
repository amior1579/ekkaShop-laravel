<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username' => 'required|unique:users|string|max:50',
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:255|unique:users',
            'phoneNumber' => 'nullable|string|size:11|regex:/^09[0-9]{9}$/',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive,pending',
            'role' => 'required|in:admin,seller,customer',
            'password' => 'required|string|min:4',

//           permissions
            'permissions.UserManagement' => 'nullable|array',
            'permissions.UserManagement.*' => 'string|in:view_users,create_user,edit_user,delete_user,reset_password,manage_roles',

            'permissions.ProductManagement' => 'nullable|array',
            'permissions.ProductManagement.*' => 'string|in:view_product,create_product,edit_product,delete_product,product_category,product_inventory,product_pricing,product_reviews,public_product,product_tags,product_SEO,product_analytics',

        ];
    }
}
