<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PosController extends Controller
{
    public function index(){

    }
    public function orders(){
        return Inertia::render('Pos/Orders');
    }
}
