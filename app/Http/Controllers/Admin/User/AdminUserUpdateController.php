<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;

class AdminUserUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request ,User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.users.show', $user->id);
    }
}
