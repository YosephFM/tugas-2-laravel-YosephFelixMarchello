<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table = 'sesi';
    protected $fillable = [
    'nama'];
    
    
    public function sesi()
    {
        return $this->belongsTo(Jadwal::class, 'sesi_id', 'id');
    }
        

    // Define any relationships or additional methods here if needed
}
