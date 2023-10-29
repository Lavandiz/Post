<?php
namespace App\Repositories;
use App\Interfaces\RegisterRepositoryInterface;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class RegisterRepository implements RegisterRepositoryInterface{
    use  ValidatesRequests;

    public function RegisterUser(Request $request){

        //Validate registration request
        $this->RegisterUserValidate($request);

        //Create registration request
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "username" => $request->username
        ]);

        
        //return the status of login
       return  auth()->attempt($request->only('email','password'));

    /*    auth()->attempt([
            "username"=>$request->username,
            "password"=>Hash::make($request->password)
        ]);*/

    }

    public function RegisterUserValidate(Request $request){

       return $this->validate($request,[
            "name"=>"required|max:200",
            "username"=>"required",
            "email"=>"required|email|max:200",
            "password"=>"required|confirmed"
        ]);

        
    }

    public function LoginUserValidate(Request $request){

       return $this->validate($request,[
            "email"=>"required|email",
            "password"=>"required"
        ]);

        
    }


    public function Login(Request $request){

        $this->LoginUserValidate($request);
     
        return auth()->attempt($request->only('email','password'),$request->remember);

    }


}



?>