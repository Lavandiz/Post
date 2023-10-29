<?php

namespace App\Services;
use App\Interfaces\RegisterRepositoryInterface;
use Illuminate\Http\Request;

class LoginService{

    private RegisterRepositoryInterface $registerInterface;

    public function __construct(RegisterRepositoryInterface $registerInterface) 
    {
        $this->registerInterface = $registerInterface;
    }

    public function Login(Request $request){

        $redirect = $this->registerInterface->Login($request)?redirect()->route('dashboard'):redirect()->route('login')->with('status', 'Invalid username or password!');

        return $redirect;
      
    }

}


?>