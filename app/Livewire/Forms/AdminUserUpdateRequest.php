<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rule;


class AdminUserUpdateRequest extends Form
{
    public $name, $email, $password, $role_id, $ignore;

    public function rules(): array
    {
        $arr['form.name'] = ['required', 'min:3', 'max:20'];
        $arr['form.email'] = ['required', 'email', 'max:40', Rule::unique(User::class,'email')->ignore($this->ignore)];
        $arr['form.password'] = ['required'];
        $arr['form.role_id'] = ['required', 'int'];
        return $arr;
    }

    /**
     * Define public function attributes()
     */
    public function attributes()
    {
        $arr['form.name'] = 'Name';
        $arr['form.email'] = 'Email';
        $arr['form.password'] = 'Password';
        $arr['form.role_id'] = 'Role';
        return $arr;
    }
}
