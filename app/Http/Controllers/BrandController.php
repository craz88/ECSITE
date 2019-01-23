<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Maker;
use DB;

class BrandController extends Controller{

	 public function index() {
    		$datas = DB::table('brands')->join('makers', 'makers.MakerId', '=', 'brands.MakerId')->select('brands.*','makers.MakerName')->get();
    		
    		return view('Brand.Brand')->with('datas', $datas);
   }

   public function BrandAddPage() {
    	  $datas=Maker::latest()->get();
  		
  		  return view('Brand.BrandPlus')->with('datas',$datas);
   }

   public function BrandAdd(Request $request){
		    $brand = new Brand();
      	$brand->MakerId=$request->AddMakerId;
      	$brand->BrandName = $request->AddBrandName;
      	$brand->save();
      	
      	return redirect('/Brand');
   }

   public function BrandDelete(Request $request){
      	$brand = new Brand();
      	$checkbox=$request->check;
      	
      	for($i=0;$i<count($checkbox);$i++){
        		$brandid = $checkbox[$i];
            	$brand=Brand::find($brandid);
            	$brand->delete();
        }
	 }

	 public function BrandEditPage(Request $request){
    		$checkbox=$request->check;
    		$brandid = $checkbox[0];
    		
    		$brand = DB::table('brands')->join('makers', 'makers.MakerId', '=', 'brands.MakerId')->select('brands.*','makers.MakerName')->where('brands.BrandId',$brandid)->get();
    		
    		$maker =Maker::latest()->get();
    		
    		return view('Brand.BrandEdit', compact('brand', 'maker'));
    }

    public function BrandEdit(Request $request){
    		$brandid=$request->EditBrandId;
    		$makerid=$request->EditMakerId;
    		$brandname =$request->EditBrandName;

    		$brand=Brand::find($brandid);
    		$brand->BrandName=$brandname;
    		$brand->MakerId=$makerid;
    		$brand->save();
    		
    		return redirect('/Brand');
    }

    public function BrandSearch(Request $request){
      	$brandid=$request->brandid;
      	$brandname=$request->brandname;
      	$makerid=$request->makerid;
      	
      	$datas = DB::table('brands')->join('makers', 'makers.MakerId', '=', 'brands.MakerId')->select('brands.*','makers.MakerName')->where('makers.MakerName', 'like', '%' . $makerid . '%')
                     ->Where('brands.BrandId', 'like', '%' . $brandid . '%')->where('brands.BrandName','like','%'.$brandname. '%')->get();
      	
  		  return view('Brand.Brand')->with('datas', $datas);
    }
    
}