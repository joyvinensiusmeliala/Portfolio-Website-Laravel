<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $fillable=['nama_pekerjaan','nama_perusahaan','job_desc','start_bekerja','end_bekerja','lokasi','photo','status'];

    // public static function getProductByBrand($id){
    //     return Product::where('brand_id',$id)->paginate(10);
    // }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id')->where('status','active');
    }
    public static function getProductByBrand($slug){
        // dd($slug);
        return Pekerjaan::with('products')->where('slug',$slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
}
