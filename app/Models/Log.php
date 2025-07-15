<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log_history';    
    protected $primaryKey = 'id';
    protected $fillable = ['id','db_ticket','db_catatan','db_user','user_id','tindakan','catatan',"updated_at","created_at"];
}
