<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conges extends Model
{
    //
    protected $fillable = ['id','start_date', 'end_date', 'status', 'comments'];


    public function employes() {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

}
