<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Redirige a la página de login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('login');
    }
}
