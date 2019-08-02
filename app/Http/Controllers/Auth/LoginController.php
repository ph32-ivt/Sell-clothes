<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use App\User;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }

    public function getLogin()
    {
        // dd(bcrypt(123456));
        return view('admin.login.index');
    }

    public function postLogin(LoginRequest $request)
    {
        $login = array(
            'email'    => $request->email,
            'password' => $request->password,
            // 'role_id'  => 1
        );
        $user = User::where('email', $request->email)->first();
        if ($user->role_id == 1 || $user->role_id == 2) {
            if (Auth::attempt($login)) {
                return redirect()->route('product-list');
            } else {
                return redirect()->back()->with(['type_message' => 'danger', 'flash_message' => 'Email or Password is not correct !']);
            }
        } else {
            return redirect()->back()->with(['type_message' => 'danger', 'flash_message' => 'You don\'t have permission access this page !']);
        }       
    }

    public function getRegister()
    {
        return view('admin.login.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        // $register = User::create([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'password'  => Hash::make($request->password),
        //     'telephone' => $request->telephone,
        //     'address'   => $request->address,
        //     'role_id'   => $request->role_id,
        //     'gender'    => $request->gender
        // ]);
        $register = User::create($data);
        return redirect()->route('getLogin')->with(['type_message' => 'success', 'flash_message' => 'Success ! Complete create username']);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('homepage');
        // return redirect(\URL::previous());
    }

}
