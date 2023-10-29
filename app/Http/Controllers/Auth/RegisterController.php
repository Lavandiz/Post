<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RegisterRepo;
use  App\Interfaces\RegisterRepositoryInterface;

class RegisterController extends Controller
{
    private RegisterRepositoryInterface $registerInterface;

    public function __construct(RegisterRepositoryInterface $registerInterface) 
    {
        $this->middleware(['guest']);
        $this->registerInterface = $registerInterface;
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        $this->registerInterface->RegisterUser($request);

        return redirect()->route('dashboard');
      
    }
}
