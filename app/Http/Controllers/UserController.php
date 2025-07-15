<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Log;
use DB;

class UserController extends Controller
{
    public function index()
    {      
        $dataUser = User::paginate(10);
        return view('user/data_user',['dataUser'=>$dataUser]);        
    }
    public function tambahUser()
    {      
        return view('user/tambah_user');        
    }
    public function simpanUserBaru(Request $a){              
        $message = [
             'unique' => ' - Sudah tersedia !',
             'unique' => ' - Sudah tersedia !'
         ];
        $a->validate([
            'username' => 'unique:users,username',
            'email'    => 'unique:users,email',
        ], $message);    
        $user= User::create([
                'name' => $a->nama,
                'username' => $a->username,
                'email' => $a->email,
                'role' => $a->role,
                'password' => Hash::make($a->password)
        ]);        
        Log::create([
            'db_ticket' => "-",
            'db_user' => $id_user,
            'db_catatan' => "-",
            'user_id' => auth()->user()->id,
            'tindakan' => 'create',
            'catatan' => 'Melakukan penambahan User'
        ]);
        return redirect('/data-user')->with('success',['toast'=>"show"]);
    }
    public function kelolaUser($id_user){  
        //dd($id_user);     
        $dataUser = User::find($id_user);
        return view('user/kelolauser',['user'=>$dataUser,]);
    }    
    public function simpanKelolaUser($id_user, Request $a)
    {
        if ($a->password == null) { 

            User::where('id',$id_user)->update([  
                'name' => $a->nama,
                'username' => $a->username,
                'email' => $a->email,
                'role' => $a->role
            ]);

        }else {
            // dd($a->password);
            User::where('id',$id_user)->update([  
                'name' => $a->nama,
                'username' => $a->username,
                'email' => $a->email,
                'password' => Hash::make($a->password),
                'role' => $a->role
            ]);
        }
        Log::create([
            'db_ticket' => "-",
            'db_user' => $id_user,
            'db_catatan' => "-",
            'user_id' => auth()->user()->id,
            'tindakan' => 'update',
            'catatan' => 'Melakukan perubahan data User'
        ]);
        return redirect('/data-user')->with('successUpt',['toast'=>"show"]);
    }
}
