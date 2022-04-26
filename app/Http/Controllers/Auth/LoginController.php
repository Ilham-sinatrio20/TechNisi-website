<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller {
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req){
        // $inputVal = $request->all();
        $input = $req->all();
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array(
            'email' => $input['email'],
            'password' => $input['password']
        ))){
            if(auth()->user()->id_role == 2){
                Alert::success('Success', 'Login Sukses');
                return redirect()->route('index.home');
            } else if(auth()->user()->id_role == 3){
                Alert::success('Success', 'Login Sukses');
                return redirect()->route('index.home');
            }
        } else {
            Alert::error('Error', 'Email atau Password Salah');
            return back();
        }
    }
}
