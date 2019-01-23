<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maker;
class MakerController extends Controller{

	public function index() {
		$datas = Maker::latest()->get();

		return view('Maker.Maker')->with('datas', $datas);
    }

    public function MakerAddPage() {
       
        return view('Maker.MakerPlus');
    }

    public function MakerAdd(Request $request){
    	$maker = new Maker();
	    $maker->MakerName = $request->AddMakerName;
	    $maker->save();
	    
	    return redirect('/Maker');
    }


    public function MakerDelete(Request $request){
    	$maker = new Maker();
    	$checkbox=$request->check;

    	for($i=0;$i<count($checkbox);$i++){
    		$makerid = $checkbox[$i];
        	$maker=Maker::find($makerid);
        	$maker->delete();
        }
    	
    	return redirect('/Maker');
	}

	public function MakerEditPage(Request $request){
		$maker = new Maker();
		$checkbox=$request->check;
		$makerid = $checkbox[0];

		$maker=Maker::find($makerid);
		
		return view('Maker.MakerEdit')->with('maker', $maker);
    }

	public function MakerEdit(Request $request){
		
		$makerid=$request->editmakerid;
		$makername =$request->editmakername;

		$maker=Maker::find($makerid);
		$maker->MakerName=$makername;
		$maker->save();
		
		 return redirect('/Maker');
    }

    public function MakerSearch(Request $request){
    	$makerid=$request->makerid;
    	$makername =$request->makername;

    	$datas = Maker::where('Makerid', 'like', '%' . $makerid . '%')
                   ->Where('MakerName', 'like', '%' . $makername . '%')->get();

		return view('Maker.Maker')->with('datas', $datas);
    }
    
}