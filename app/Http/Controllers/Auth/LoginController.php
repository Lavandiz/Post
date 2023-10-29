<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\RegisterRepositoryInterface;
use App\Services\LoginService as ServicesLoginService;
use App\Services\LoginService\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private RegisterRepositoryInterface $registerInterface;

    public function __construct(RegisterRepositoryInterface $registerInterface) 
    {
        $this->middleware(['guest']);
        $this->registerInterface = $registerInterface;
    }

    public function index(){
        return view('auth.login');
    }

    public function Login(Request $request){

        $ls = new ServicesLoginService($this->registerInterface);
       return $ls->Login($request);
      
      
    }
}
