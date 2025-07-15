<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class HomeController extends Controller
{
    public function index()
    {      
        return view('home');
        
    }
    public function tentangSistem()
    {      
        return view('tentangsistem');
        
    }
    public function log()
    {  
        $dataLog = Log::orderBy('created_at','desc')
        ->paginate(10);    
        return view('log',['iLog'=>$dataLog]);
        
    }
}
