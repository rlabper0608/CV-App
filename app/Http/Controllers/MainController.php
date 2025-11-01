<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\View\View;

class MainController extends Controller{

    function main(){
        return view('main.main');
    }
}
