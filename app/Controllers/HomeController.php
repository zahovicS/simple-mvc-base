<?php

namespace App\Controllers;

use App\Models\User;
use System\Base\Controller;
use System\Http\Response;
use System\Views\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::render("home");
    }
    public function orders()
    {
        return Response::json([
            [
                "id" => 2,
                "total" => 20,
                "items" => 2,
            ],
            [
                "id" => 3,
                "total" => 68,
                "items" => 3,
            ],
            [
                "id" => 6,
                "total" => 100,
                "items" => 5,
            ],
        ]);
    }
    public function users()
    {
        $users = User::getAllUsers();
        return Response::json($users);
    }
    public function user($username)
    {
        $users = User::getUserByUsername($username);
        return Response::json($users);
    }
    public function dummy()
    {
        $users = User::getBlogs();
        return Response::json($users);
    }
}
