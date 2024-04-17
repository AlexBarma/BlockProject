<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\User\PasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use Illuminate\Auth\Events\Registered;

class AdminUserStoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data=$request->validated(); //<-------проверка формы
        StoreUserJob::dispatch($data);//<------метод dispatch реализует работу класса StoreUserJob который запускат очередь с отправкой писем
        return redirect()->route('admin.users');
    }

}
