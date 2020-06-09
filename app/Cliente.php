<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table = 'clientes';
    use SoftDeletes;

    protected $dates = ['deleted_at', 'created_at', 'date'];

    protected $fillable = [ 'name', 'document', 'date', 'email', 'active'];


    // Scope

    public function scopeName($query, $name){
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeDateIni($query, $dateIni){
        if($dateIni)
            return $query->where('created_at', T_IS_GREATER_OR_EQUAL, $dateIni);
    }

    public function scopeDateEnd($query, $dateEnd){
        if($dateEnd)
            return $query->where('created_at', T_IS_SMALLER_OR_EQUAL , $dateEnd);
    }
}