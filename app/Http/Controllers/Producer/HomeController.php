<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:producer');
    }

    /**
     * Show the application dashboard.
     *
     * @return use Illuminate\View\View;
     */
    public function home(): View
    {
        return view('producer.home');
    }
}
