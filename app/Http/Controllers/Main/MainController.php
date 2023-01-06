<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function check(Request $request)
    {
        $users = [
            0 => ['id' => 0, 'name' => 'John', 'email' => 'john@gmail.com'],
            1 => ['id' => 1, 'name' => 'David', 'email' => 'david@gmail.com'],
            2 => ['id' => 2, 'name' => 'Lisa', 'email' => 'lisa@gmail.com'],
            3 => ['id' => 3, 'name' => 'Test', 'email' => 'test@gmail.com'],
            4 => ['id' => 4, 'name' => 'Somename', 'email' => 'somename@gmail.com'],
        ];

        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else{
            $data = $request->all();
            $status = 1;

            foreach ($users as $user)
            {
                if ($user['email'] == $data['email']){
                    $status += 1;
                }
                else {
                    $status += 0;
                }
            }
            if ($status == 1) {
                $log = date('Y-m-d H:i:s') . ' ' . $data['email'] . ' Користувача успішно зареєстровано';
            } else {
                $log = date('Y-m-d H:i:s') . ' ' . $data['email'] . ' Користувач з таким e-mail уже існує. Реєстрацію скасовано.';
            }

            file_put_contents('../public/log.txt', $log . PHP_EOL, FILE_APPEND);

            return response()->json(['status' => $status]);
        }
    }
}
