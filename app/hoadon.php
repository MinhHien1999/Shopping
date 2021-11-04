<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
    protected $table = 'hoadon';
    protected $primaryKey = 'id_hoadon';

    public function chitiethd()
    {
        return $this->hasMany('App\chitiethd', 'chitiethd_id_hd', 'id_hoadon');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\khachhang', 'hoadon_id_kh', 'id_hoadon');
    }
}
