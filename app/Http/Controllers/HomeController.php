<?php

namespace App\Http\Controllers;

use Versyx\Controller;

/**
 * Home controller class.
 */
class HomeController extends Controller
{
    /**
     * Render the home page.
     * 
     * @return mixed
     */
    public function index()
    {
        return $this->view('home');
    }
}
