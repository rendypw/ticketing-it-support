<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticketing;
use App\Models\Kategori;
use App\Models\Log;

class PengajuanTicketingController extends Controller
{
    public function index()
    {   
        $dataKategori = Kategori::all();   
        return view('ticketing/pengajuan_ticketing',['iDataKategori'=>$dataKategori]);        
    }
    public function inputTicketing(Request $a)
    {   
        $pesan = [
             'max' => ' - File Tidak Sesuai !'
         ];
        $a->validate([
            'fileUpload' => 'nullable|file|max:11000'
        ],$pesan);
        $vNoTicket = "-LL/";
        if ($a->kategori == "1") {
            $vNoTicket = "-H/";
        }elseif ($a->kategori == "2") {
            $vNoTicket = "-S/";
        }elseif ($a->kategori == "3") {
            $vNoTicket = "-J/";
        }        
        $file = $a->file('fileUpload');
        if (file_exists($file)) { 
            $namaFile = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $pathAsli = $file->getRealPath();
            $namaFolder = 'FileUpload';
            $file->move($namaFolder, $namaFile);
            $pathPublic = $namaFolder . "/" . $namaFile;
        } else{
            $pathPublic = Null;
        }

        $lastTicket = Ticketing::all()->count();
        $nextNo = str_pad($lastTicket + 1, 4, '0', STR_PAD_LEFT);
        $ticketNo = $vNoTicket . $nextNo;        
        
        $ticket = Ticketing::create([
            'ticket_no' => 'IT'.$ticketNo,
            'user_id' => auth()->user()->id,
            'kategori_id' => $a->kategori,
            'file_upload' => $pathPublic,
            'keterangan' => $a->keterangan,
            'status' => "Open"
        ]);
        Log::create([
            'db_ticket' => $ticket->id,
            'db_user' => "-",
            'db_catatan' => "-",
            'user_id' => auth()->user()->id,
            'tindakan' => 'create',
            'catatan' => 'Melakukan pengajuan Ticket'
        ]);
        return redirect('/ajukan-tiket')->with('success',['toast'=>"show"]);    
    }
}
