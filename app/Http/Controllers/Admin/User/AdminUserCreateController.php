<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserCreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.users.create');
}
};
