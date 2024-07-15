<?php

namespace App\Http\Controllers;

use Versyx\Http\AbstractController;

/**
 * Home controller class.
 */
class HomeController extends AbstractController
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
