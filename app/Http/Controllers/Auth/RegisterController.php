<?php


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Response;

class RegisterController extends Controller
{
    protected $users = null;

    public function __construct(User $users){
        $this->users = $users;
    }

    public function saveUser(){
        return Response::json($this->users->saveUser(), 200);
    }
}
