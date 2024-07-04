<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function __construct()
    {
        view()->share('adminTheme','adminTheme.default');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crudMessage($type, $module)
    {
        switch ($type) {
            case 'add':
                return $module . ' Created';
                break;
            case 'delete':
                return $module . ' Deleted';
                break;
            case 'update':
                return $module . ' Updated';
                break;
            
            default:
                # code...
                break;
        }
    }
}
