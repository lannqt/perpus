<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class perpustakaanController extends Controller
{
    public static function index()
    {
        return view('index');
    }

    public static function buku()
    {
        return view('buku');
    }   
}