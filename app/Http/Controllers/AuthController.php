<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('regis')->with('warning',$errorString);       
        }else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $user->assignRole('admin');
            $role = "admin";

            if (Auth::attempt($request->only('email','password'))) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('regis')->with('warning',"Terjadi kesalahan");

            }
        }

        
    }

    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        );
        $cek = Validator::make($request->all(),$rules);
        if ($cek->fails()) {
            $errorString = implode(",",$cek->messages()->all());
            return redirect()->route('login')->with('warning',$errorString);
        } else {
            if (Auth::attempt($request->only('email','password'))) {
                $user = User::where('email',$request->email)->first();
                // $roles = $user->getRoleNames();
                // if ($roles[0] == 'admin') {
                    return redirect()->route('dashboard');
                // } else {
                //     return redirect()->route('dashboardUser');
                // }
                
            } else {
                return redirect()->route('login')->with('warning',"Email / Password anda salah");

            }
            
        }
        
    }

    // method for user logout and delete token
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
