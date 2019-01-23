<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use DB;
class SaleController extends Controller{

	public function index() {

		$datas = Sale::latest()->get();

		return view('Sale.Sale')->with('datas', $datas);
    }

    public function SaleAddPage() {
       
        return view('Sale.SalePlus');
    }

    public function SaleAdd(Request $request){
    	$sale = new Sale();

	    $sale->SaleName = $request->salename;
	    $sale->Discount = $request->discount;
	    $sale->StartTime = $request->starttime;
	    $sale->EndTime = $request->endtime;
	    $sale->Attribute = $request->yen;
	  
	    $sale->save();
	    
	    return redirect('/Sale');
    }


    public function SaleDelete(Request $request){
    	
    	$checkbox=$request->check;

    	for($i=0;$i<count($checkbox);$i++){
    		$saleid = $checkbox[$i];
        	$sale=Sale::find($saleid);
        	$sale->delete();
        }
    	
    	return redirect('/Sale');
	}

	public function SaleEditPage(Request $request){
		 $sale = new Sale();
		$checkbox=$request->check;
		$saleid = $checkbox[0];

		$sale=Sale::find($saleid);
		
		return view('Sale.SaleEdit')->with('sale', $sale);
    }

	public function SaleEdit(Request $request){
		
		$saleid=$request->saleid;
		

		$sale=Sale::find($saleid);

		$sale->SaleName=$request->salename;
		$sale->Discount=$request->discount;
		$sale->Attribute=$request->yen;
		$sale->StartTime=$request->starttime;
		$sale->EndTime=$request->endtime;
	
		$sale->save();
		
		return redirect('/Sale');
    }

    public function SaleSearch(Request $request){

        

    	$datas = Sale::where('SaleName', 'like', '%' . $request->salename . '%')
                      ->Where('StartTime', 'like', '%' . $request->starttime . '%')
                      ->Where('EndTime', 'like', '%' . $request->endtime . '%')
                      ->Where('Discount', 'like', '%' . $request->discount . '%')
                      ->Where('Attribute', 'like', '%' . $request->yen . '%')
                      ->get();

		return view('Sale.Sale')->with('datas', $datas);
    }
}

