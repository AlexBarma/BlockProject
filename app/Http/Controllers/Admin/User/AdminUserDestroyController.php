<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserDestroyController extends Controller
{
    public function __invoke(User $user)
    {
       $user->delete() ;
       return redirect()->route('admin.users');
    }
}
