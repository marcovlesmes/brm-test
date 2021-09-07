<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $infos = Info::get();
        $imgs = Image::get();
        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();
        return view('index', compact('infos', 'imgs', 'permissions'));
    }
}
