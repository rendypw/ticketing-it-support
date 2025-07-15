<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = "catatan";
    protected $primaryKey = 'id';
    protected $fillable = ["id","ticket_id","user_id", "catatan", "file_catatan","updated_at","created_at"];
}
