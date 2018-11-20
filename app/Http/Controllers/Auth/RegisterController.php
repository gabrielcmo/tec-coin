<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'numeric', 'min:0', 'max:4'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],
        [
            'name.required' => 'Favor preencher o campo nome.',
            'role.numeric' => 'Favor escolher um tipo de usuário válido.',
            'role.min' => 'Favor escolher um tipo de usuário válido.',
            'role.max' => 'Favor escolher um tipo de usuário válido.',
            'role.required' => 'Favor escolher um tipo de usuário válido.',
            'email.unique' => 'Este email já foi cadastrado. Favor escolher outro.',
            'email.required' => 'Favor preencher o campo e-mail',
            'email.max' => 'O e-mail não pode ter mais do que 255 caracteres',
            'email.email' => 'O campo e-mail precisa ser um e-mail válido',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $success=true;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type_id' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
