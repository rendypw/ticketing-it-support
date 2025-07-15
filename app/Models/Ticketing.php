<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;
    protected $table = "ticketing";
    protected $primaryKey = 'id';
    protected $fillable = ["id","ticket_no","user_id","kategori_id","file_upload","keterangan","status","updated_at","created_at"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
