<?php

namespace App\Services;

use App\Models\User;

class UserService {
    
    public function index() {
        $users = User::select('id','name','email','type_login','created_at','status')
                        ->orderBy('created_at')
                        ->get();

        return $users;
    }
}