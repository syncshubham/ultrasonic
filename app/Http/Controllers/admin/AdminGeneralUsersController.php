<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;



class AdminGeneralUsersController extends Controller
{
    public function view_all_users()
    {
        $users = User::orderBy("created_at", "desc")->get();
        $usersCount = $users->count();
        return view("admin.users.view-all", compact("users", "usersCount"));
    }

    public function destroy_user($id)
    {
        // Find the item to delete
        $user = User::findOrFail($id);
        // Delete the item
        $user->delete();

        return redirect()->back()->with('successuserdelete', 'User deleted successfully');
    }
}