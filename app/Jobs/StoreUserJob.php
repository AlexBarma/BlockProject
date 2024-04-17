<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Mail\User\PasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $password=Str::random(10); //<-------присваивем переменной $password случайный пороль из 10 символов
        $this->data['password']=Hash::make($password); //<------- обязательно хеширование заданного пользователем пароля и сохранение в базе данных (такая реализация в админке нужна т.к. при обычное регистрации пользователя его пароль проходит так же хеширование)
        $user = User::firstOrCreate(['email'=>$this->data['email']],$this->data); //<-------присваивем переменной $user созданного пользователя. Строчка firstOrCreate(['email'=>$data['email']],$data) это признак по которому будет происходить поиск пользователя ( можете передать массив значений в метод firstOrCreate(), и он будет искать запись с указанными свойствами. Если она существует, метод вернёт найденный экземпляр, а если нет — создаст её и вернёт созданный экземпляр.)
        Mail::to($this->data['email'])->send(new PasswordMail($password)); //<-------Через класс Mail на почту пользователя отправляется рандомный пароль с помощью метода send (создается класс PasswordMail в который отправляется информация из resources\views\mail\user\password.blade.php) и все это отправляется на почту пользователя
        event(new Registered($user)); //<------- event запускает спец сценарий который отправляет письмо на почту созданного пользователя
    }
}
