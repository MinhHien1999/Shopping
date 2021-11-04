<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethd extends Model
{
    //
    protected $table = 'chitiethd';
    protected $primaryKey = 'id_chitiet_hoadon';

    public function sanpham()
    {
        return $this->belongsTo('App\sanpham', 'chitiethd_id_sanpham', 'id_chitiet_hoadon');
    }
    public function hoadon()
    {
        return $this->belongsTo('App\hoadon', 'chitiethd_id_hd', 'id_chitiet_hoadon');
    }
}
