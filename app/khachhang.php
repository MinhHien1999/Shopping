<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    //
    protected $table = 'khachhang';
    protected $primaryKey = 'id_khachhang';

    public function hoadon()
    {
        return $this->hasMany('App\hoadon', 'hoadon_id_kh', 'id_khachhang');
    }
}
