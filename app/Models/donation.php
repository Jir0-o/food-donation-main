<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'criteria',
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function admin(){
        return $this->belongsTo(User::class,'isadmin');
    }
}
