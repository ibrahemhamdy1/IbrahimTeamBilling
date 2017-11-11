<?php

namespace App\Http\Controllers;

use App\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends ParentController
{
    public function __construct()
    {
        $this->model='App\WebSite';
        $this->file='website';
        $this->route ='websites';
        $this->item='website';

    }
}
