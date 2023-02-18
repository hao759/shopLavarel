<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $time_stamps = false;
    protected $fillable = [
        'brand_name', 'brand_status', 'brand_desc',
    ];
    protected $primaryKey = 'brand_id ';
    protected $table = 'tbl_brand';
    // public function product()
    // {
    //     return $this->hasMany('App\Product', 'brand_id');
    // }
}