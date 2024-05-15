<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static function dashboard()
     {
     
    
       $bookCount = book::count();
       $totalAccounts = User::count();
  
          // Tampilkan hasil di view
         return view('dashboard', ['totalAccounts' => $totalAccounts, 'bookCount' => $bookCount]);
   
     }

}