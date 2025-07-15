<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticketing;
use App\Models\Kategori;
use App\Models\Catatan;
use App\Models\Log;

class DataTicketingController extends Controller
{
    public function index()
    {   
        if (auth()->user()->role == "Admin") {
            $dataTicketing = Ticketing::join('users','ticketing.user_id','=', 'users.id')
            ->join('kategoris','ticketing.kategori_id','=', 'kategoris.id')
            ->orderBy('ticketing.created_at','desc')
            ->select(['ticketing.*','kategoris.nama_kategori', 'users.name','users.role'])
            ->paginate(10);   
            return view('ticketing/data_ticketing',['iDataTicketing'=>$dataTicketing]);  
            # code...
        }
        $dataTicketing = Ticketing::join('users','ticketing.user_id','=', 'users.id')        
        ->join('kategoris','ticketing.kategori_id','=', 'kategoris.id')
        ->where('ticketing.user_id',auth()->user()->id)
        ->orderBy('ticketing.created_at','desc')
        ->select(['ticketing.*','kategoris.nama_kategori', 'users.name','users.role'])
        ->paginate(10);   
        return view('ticketing/data_ticketing',['iDataTicketing'=>$dataTicketing]);    
        
    }
    
    public function filterTicket(Request $request)
    {
        $kategori = $request->input('kategori');
        $tanggal = $request->input('tanggal');

        $query = Ticketing::query()
            ->join('users','ticketing.user_id','=', 'users.id')
            ->join('kategoris','ticketing.kategori_id','=', 'kategoris.id');

        if (!empty($kategori)) {
            $query->where('ticketing.kategori_id', $kategori)
            ->orderBy('ticketing.created_at','desc');
        }

        if (!empty($tanggal)) {
            $query->whereDate('ticketing.created_at', $tanggal)
            ->orderBy('ticketing.created_at','desc');
        }

        $data = $query->select(['ticketing.*','kategoris.nama_kategori', 'users.name','users.role'])
                    ->paginate(10);   ;

        return view('ticketing/data_ticketing', ['iDataTicketing'=>$data]);
    }


    public function dataDetail($id)
    {   
        $dataKategori = kategori::all();
        $dataTicketing = Ticketing::with(['user', 'kategori'])->find($id);
        $dataCatatan = Catatan::join('users','catatan.user_id','=', 'users.id')
        ->where('ticket_id',$id)
        ->orderBy('catatan.created_at','desc')
        ->get(['catatan.*', 'users.name','users.role']);   
        return view('ticketing/detail_data_ticketing',['iDataTicketing'=>$dataTicketing, 'iDataCatatan'=>$dataCatatan, 'iDataKategori'=>$dataKategori]);    
        
    }
    public function inputProsesTicketing($id, Request $a)
    {      
        $pathPublic = Null;      
        if (!empty($a->catatan)) { 
            if (!empty($a->file_upload)) {    
                $pesan = [
                'max' => ' - File Tidak Sesuai !'
                ];
                $a->validate([
                    'file_catatan' => 'nullable|file|max:11000'
                ],$pesan);

                $file = $a->file('file_catatan');
                $namaFile = time() . "-" . $file->getClientOriginalName();
                $ekstensi = $file->getClientOriginalExtension();
                $ukuran = $file->getSize();
                $pathAsli = $file->getRealPath();
                $namaFolder = 'FileCatatan';
                $file->move($namaFolder, $namaFile);
                $pathPublic = $namaFolder . "/" . $namaFile;   
            }              
            $catatan = Catatan::create([
                'ticket_id' => $id,
                'user_id' => auth()->user()->id,
                'catatan' => $a->catatan,
                'file_catatan' => $pathPublic,
            ]);
            Log::create([
            'db_ticket' => "-",
            'db_user' => "-",
            'db_catatan' => $catatan->id,
            'user_id' => auth()->user()->id,
            'tindakan' => 'create',
            'catatan' => 'Memberikan catatan Ticketing'
            ]);  
        }              
 
        
        $ticketing = Ticketing::where('id',$id)->update([  
            'status' => $a->status
        ]);
        
        Log::create([
            'db_ticket' => $id,
            'db_user' => "-",
            'db_catatan' => "-",
            'user_id' => auth()->user()->id,
            'tindakan' => 'create',
            'catatan' => 'Melakukan perubahan status ticket menjadi : '.$a->status
        ]);
        
        return back()->with('success',['toast'=>"show"]);
        
    }
}
