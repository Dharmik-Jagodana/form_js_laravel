<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;

class AdminHomeController extends AdminController
{
    /**
     * write code for.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     * @author <>
     */
    public function index()
    {
        return view('adminTheme.home');
    }
}
