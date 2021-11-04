<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //
    protected $table = 'sanpham';
    protected $primaryKey = 'id_sanpham';

    public function nsx()
    {
        return $this->belongsTo('App\nsx', 'sanpham_id_nsx', 'id_sanpham');
    }
    public function chitietsp()
    {
        // return $this->hasMany('App\chitietsp', 'chitietsp_id_sp', 'id_sanpham');
        return $this->hasOne('App\chitietsp', 'chitietsp_id_sp', 'id_sanpham');
    }
    public function chitiethd(){
        return $this->hasMany('App\sanpham', 'chitiethd_id_sanpham', 'id_sanpham');
    }
}
