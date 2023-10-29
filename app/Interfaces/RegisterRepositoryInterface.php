<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface RegisterRepositoryInterface 
{
    public function RegisterUser(Request $request);
    public function Login(Request $request);

}



?>