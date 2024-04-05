<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class AdminUserStoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data=$request->validated();
        User::firstOrCreate($data);
        return redirect()->route('admin.users');
    }

}
