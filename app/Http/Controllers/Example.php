<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Register;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function home()
	{ 
	  $register =Register::all();
	 // dd($register);
	 return view('home',['register'=>$register]);
	
	}
	 public function about()
	{
	  return view('about',['title'=>'About Us']);
	
	}
	   public function store(Request $request)
	{
	  $validate=$request->validate([
	    'name'=>['required' , 'max:124']
		// 'name'->'required|max:124'] 
	  ]);
	  
	  Register::create($validate); ///mass assignment.....below 3 lines in a single by giving fillabe functiion on model
	  
	  
	/* // $register =new Register();
	  $register =new Register;
	  
	 // $register->name=$request->post('title');
	   $register->name=$request->'title';
	   
	  $register->save();*/
	  
	  
	  
	  
	  return redirect(route('home'));
	 // return back();
	
	
	}
	
	public function edit($id)//ROUTE MODEL BINDING===names '$id' and parametr in the root 'id' must be same to this method
	{ 
	 //dd($id);
	 $register = Register::findOrFail($id);
	
	 return view('update',compact('register'));//['register'=>$register]
	
	}
	public function update(Request $request,$id)
	{ 
	 //dd($id);
	 $register = Register::findOrFail($id);
	   $validate=$request->validate([
	    'name'=>['required' , 'max:124']
		// 'name'->'required|max:124'] 
	  ]);
	  $register->update($validate);
	  
	  
	   return redirect(route('home'));
	
	}
	public function delete(Register $id)
	{ 
	 
	//$register = Register::findOrFail($id);
	//$register->delete();
	$id->delete();
	
	
	return redirect(route('home'));
	
	}
	
}
