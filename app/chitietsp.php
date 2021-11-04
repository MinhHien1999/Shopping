<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietsp extends Model
{
    //
    protected $table = 'chitietsp';
    protected $primaryKey = 'id_chitiet_sanpham';

    public function sanpham()
    {
        // return $this->belongsTo('App\sanpham', 'chitietsp_id_sp', 'id_chitiet_sanpham');
        return $this->hasOne('App\chitietsp', 'chitietsp_id_sp', 'id_chitiet_sanpham');
    }
    // public function chitiethd()
    // {
    //     return $this->hasMany('App\chitiethd', 'chitiethd_id_ctsanpham', 'id_chitiet_sanpham');
    // }
}
