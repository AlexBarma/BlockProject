<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserShowController extends Controller
{
   public function __invoke(User $user)
   {

    return view('admin.users.show',compact('user'));
   }
}
