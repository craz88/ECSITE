<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleOperation;
use App\Product;
use App\Sale;
use DB;

class SaleOperationController extends Controller{

    public function index() {
        $date=date("Y-m-d");
        $i=0;
        $ii=0;
        $sale  = Sale::latest()->get();	

        $product= Product::latest()->get();	
       
     	foreach($product as $data){

        	$productid=$data->ProductId;
            $param = ['productid' => $productid,'date1' => $date,'date2' => $date,];
        	$param1 = ['productid' => $productid,];
        	
            $query = "SELECT SUM( case when sales.Attribute='%' then (products.Price * sales.Discount) /100 else sales.Discount END) as discount from products left join sale_operations on sale_operations.ProductId=products.ProductId  left join sales on sale_operations.SaleId=sales.SaleId where sale_operations.ProductId=:productid and sales.StartTime<=:date1 and sales.EndTime>=:date2";


        		
        	$discount=DB::select($query,$param);
        		
        	foreach ($discount as $data){

                $product[$i]->discount=(int)$data->discount;
            }
            $i++;

            $query = "SELECT sales.SaleName from   sale_operations  left join sales on sale_operations.SaleId=sales.SaleId where sale_operations.ProductId=:productid ";

            $salename=DB::select($query,$param1);

            foreach ($salename as $data){

                if(isset($product[$ii]->SaleName)){
                    $product[$ii]->SaleName=$product[$ii]->SaleName.' , '.$data->SaleName;
                }else{
                    $product[$ii]->SaleName=$data->SaleName;
                }
            }
            $ii++;
        }
        return view('SaleOperation.SaleOperation', compact('product', 'sale'));
    }

    public function SaleInsert(Request $request){
    	
    	$checkbox=$request->check;
  		
  		$saleid =$request->saleid;

  		for($i=0;$i<count($checkbox);$i++){
  			$SaleOperation = new SaleOperation();
  			$productid = $checkbox[$i];
  			$SaleOperation->ProductId=$productid;
  			$SaleOperation->SaleId=$saleid;
  			$SaleOperation->save();
  		}
  		return redirect('/SaleOperation');

    }

 	public function SaleOperationDelete(Request $request){
    	$checkbox=$request->check;
  		$productid = $checkbox[0];
		
		$count = SaleOperation::where('ProductId','=',$productid)->count('ProductId');

  		if($count>1){
  			//セールが同時に２つ削除する
			$datas = DB::table('sales')
  						->join('sale_operations', 'sale_operations.SaleId', '=', 'sales.SaleId')
         				->join('products','products.ProductId','=','sale_operations.ProductId')
         				->select('sales.*','products.ProductId','products.ProductName','products.Price')
         				->where('sale_operations.ProductId','=',$productid)->get();

         	return view('SaleOperation.SaleMangmentEdit')->with('datas', $datas);

  		}else {
  			// 1つのセールが削除する
  			$SaleOperation = SaleOperation::where('ProductId', $productid);

  			$SaleOperation->delete();

  			return redirect('/SaleOperation');
  		}
  	}


  	public function SaleOperationDeleteTwo(Request $request){
		
		$checkbox=$request->check;
		$productid=$request->productid;

        for($i=0;$i<count($checkbox);$i++){
              $saleid = $checkbox[$i];

              $SaleOperation=SaleOperation::where('ProductId','=',$productid)
              								->where('SaleId', '=',$saleid);

              $SaleOperation->delete();
          }
        return redirect('/SaleOperation');
    }

     public function SaleOperationSearch(Request $request) {
        $date=date("Y-m-d");
        $i=0;
        $ii=0;

        $productname=$request->productname;
        $price = $request->price;
        $salename =$request->salename;

        $sale  = Sale::latest()->get();	

        $product= DB::table('products')
        			      ->join('sale_operations','sale_operations.ProductId','=','products.ProductId')
        			      ->join('sales','sales.SaleId','=','sale_operations.SaleId')
        				  ->select('products.*')
        				  ->where('products.ProductName', 'like', '%' . $productname . '%')
        				  ->where('products.Price', 'like', '%' . $price . '%')
        				  ->where('sales.SaleName','like', '%' . $salename . '%')
        				  ->get();

       
       
     	foreach($product as $data){

        	$productid=$data->ProductId;
            $param = ['productid' => $productid,'date1' => $date,'date2' => $date,];
        	$param1 = ['productid' => $productid,];
        	
            $query = "SELECT SUM( case when sales.Attribute='%' then (products.Price * sales.Discount) /100 else sales.Discount END) as discount from products left join sale_operations on sale_operations.ProductId=products.ProductId  left join sales on sale_operations.SaleId=sales.SaleId where sale_operations.ProductId=:productid and sales.StartTime<=:date1 and sales.EndTime>=:date2";


        		
        	$discount=DB::select($query,$param);
        		
        	foreach ($discount as $data){

                $product[$i]->discount=(int)$data->discount;
            }
            $i++;

            $query = "SELECT sales.SaleName from   sale_operations  left join sales on sale_operations.SaleId=sales.SaleId where sale_operations.ProductId=:productid ";

            $salename=DB::select($query,$param1);

            foreach ($salename as $data){

                if(isset($product[$ii]->SaleName)){
                    $product[$ii]->SaleName=$product[$ii]->SaleName.' , '.$data->SaleName;
                }else{
                    $product[$ii]->SaleName=$data->SaleName;
                }
            }
            $ii++;
        }
        return view('SaleOperation.SaleOperation', compact('product', 'sale'));
    }

}

