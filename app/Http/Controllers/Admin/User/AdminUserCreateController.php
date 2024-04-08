<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserCreateController extends Controller
{
    public function __invoke()
    {
        $roles= User::getRoles();
        return view('admin.users.create',compact('roles'));
}
};
