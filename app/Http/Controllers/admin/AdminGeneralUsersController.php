<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class AdminGeneralUsersController extends Controller
{
    public function view_all_users()
    {
        $users = User::orderBy("created_at", "desc")->get();
        $usersCount = $users->count();
        return view("admin.users.view-all", compact("users", "usersCount"));
    }
}