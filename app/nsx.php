<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nsx extends Model
{
    //
    protected $table = 'nsx';
    protected $primaryKey = 'id_nsx';

    public function sanpham()
    {
        return $this->hasMany('App\sanpham', 'sanpham_id_nsx', 'id_nsx');
    }
}
