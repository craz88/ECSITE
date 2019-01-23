<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Maker;
use App\Genre;
use DB;
class ProductController extends Controller{
    public function index() {
      $datas = DB::table('products')->join('genres', 'genres.GenreId', '=', 'products.GenreId')
         								          ->join('makers', 'makers.MakerId', '=', 'products.MakerId')
         								          ->join('brands', 'brands.BrandId', '=', 'products.BrandId')
         								          ->select('products.*','genres.GenreName','makers.MakerName','brands.BrandName')
                                  ->get();

      return view('Product.Product')->with('datas', $datas);
    }

    public function ProductAddPage() {
      $genre =Genre::latest()->get();
  		$maker =Maker::latest()->get();

      return view('Product.ProductPlus', compact('genre', 'maker'));
    }

    public function GetBrand($id) {
      $states = DB::table("brands")->where("MakerId",$id)->pluck("BrandName","BrandId");
      
      return json_encode($states);
    }

    public function ProductAdd(Request $request){

      $product = new Product();

      $product->GenreId = $request->AddGenreId;
      $product->MakerId = $request->country;
	    $product->BrandId = $request->state;
	    $product->ProductName = $request->productname;
	    $product->Price=$request->price;
	    $product->Image = $request->image;
	    $product->Detail = $request->detail;
      
      $product->save();

      return redirect('/Product');
    }


    public function ProductDelete(Request $request){
    	$product = new Product();
    	$checkbox=$request->check;
    	for($i=0;$i<count($checkbox);$i++){
        $productid = $checkbox[$i];
        $product=Product::find($productid);
        $product->delete();
        return redirect('/Product');
    	}
	  }

  	public function ProductEditPage(Request $request){
      $checkbox=$request->check;
  		$productid = $checkbox[0];
  		
  		$datas = DB::table('products')->join('genres', 'genres.GenreId', '=', 'products.GenreId')
         								 ->join('makers', 'makers.MakerId', '=', 'products.MakerId')
         								 ->join('brands', 'brands.BrandId', '=', 'products.BrandId')
         								 ->select('products.*','genres.GenreName','makers.MakerName','brands.BrandName')
         								 ->where('ProductId',$productid)->get();
  		
  		$genre =Genre::latest()->get();
  		$maker =Maker::latest()->get();
  		
  		return view('Product.ProductEdit', compact('genre', 'maker','datas'));
    }

  	public function ProductEdit(Request $request){
  		$product = new Product();
  		$productid=$request->editproductid;
  		$product=Product::find($productid);
  		
  		$product->GenreID=$request->editgenreid;
  		$product->MakerID=$request->country;
  		$product->BrandID=$request->state;
  		$product->ProductName=$request->editproductname;
  		$product->Price=$request->price;
  		$product->Image=$request->image;
  		$product->Detail=$request->detail;
  		$product->save();
  		
  		return redirect('/Product');
    }

    public function ProductSearch(Request $request){
    	

    	$datas = DB::table('products')->join('genres', 'genres.GenreId', '=', 'products.GenreId')
       								 ->join('makers', 'makers.MakerId', '=', 'products.MakerId')
       								 ->join('brands', 'brands.BrandId', '=', 'products.BrandId')
       								 ->select('products.*','genres.GenreName','makers.MakerName','brands.BrandName')
       								 ->where('ProductName','like', '%' . $request->productname .'%')
    								   ->where('genres.GenreName','like', '%' . $request->genrename .'%')
                       ->Where('makers.MakerName','like', '%' . $request->makername .'%')
              				 ->where('brands.BrandId', 'like', '%' . $request->brandname . '%')
              				 ->where('Price', 'like', '%' . $request->price . '%')
                       ->get();

		  return view('Product.Product')->with('datas', $datas);
    }
}

