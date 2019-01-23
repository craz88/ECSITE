<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
class GenreController extends Controller{
   
    public function index() {
       $datas = Genre::latest()->get();

       return view('Genre.Genre')->with('datas', $datas);
    }

    public function GenreAddPage() {
       
       return view('Genre.GenrePlus');
    }

    public function GenreAdd(Request $request){

        $genre = new Genre();
        $genre->GenreName = $request->AddGenreName;
        $genre->save();
        return redirect('/Genre');
    }


    public function GenreDelete(Request $request){
      	$genre = new Genre();
      	$checkbox=$request->check;

        	for($i=0;$i<count($checkbox);$i++){
              $genreid = $checkbox[$i];
              $genre=Genre::find($genreid);
              $genre->delete();
          }
        return redirect('/Genre');  
	}

  	public function GenreEditPage(Request $request){
    		$genre = new Genre();
    		$checkbox=$request->check;
    		$genreid = $checkbox[0];
    		$genre=Genre::find($genreid);
    		
    		return view('Genre.GenreEdit')->with('genre', $genre);
    }

  	public function GenreEdit(Request $request){
    		$genre = new Genre();
    		$genreid=$request->editgenreid;
    		$genrename =$request->editgenrename;

    		$genre=Genre::find($genreid);
    		$genre->GenreName=$genrename;
    		$genre->save();
    		
    		return redirect('/Genre');
      }

    public function GenreSearch(Request $request){
      	$genreid=$request->genreid;
      	$genrename =$request->genrename;
      	$datas = Genre::where('GenreId', 'like', '%' . $genreid . '%')
                   ->Where('GenreName', 'like', '%' . $genrename . '%')->get();

		    return view('Genre.Genre')->with('datas', $datas);
    }
}

