<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\Accountdetail;
use Hash;
use Session;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
	{ 
      $data = Login::all();
										
     return view('admin/register',['data'=>$data]);
    }
	 
	
    public function regstore(Request $request)
	 {
	 
	   
	  $validate=$request->validate([
	  'name'=>['required' , 'max:30'],
	  'phonenumber'=>['required' , 'max:12'],
	  'email'=>['required'],
      'password' =>['min:5'],
	  'confirmpassword' =>'required_with:password|same:password|min:5',
	 
	  ]);
	  
	  
	    
	    $register=new Login();
        $register->name = $request->post('name');
        $register->email = $request->post('email');
	    $register->phonenumber = $request->post('phonenumber');
	  
       $register->password = Hash::make($request->password); 
       $register->confirmpassword = Hash::make($request->confirmpassword);
	   $email = Login::where('email', '=', $request->post('email'))->first();
	   
	   $phonenumber = Login::where('phonenumber', '=', $request->post('phonenumber'))->first();
    if ($email === null)
	 { 
			   if($phonenumber === null)
			   {
			   $register->save();
			   }
			   else
			   {
			   return redirect(route('register'))->with('fail','Phonenumber Alredy Registered.');
			   }
		  
		  } 
		else
		{
		   return redirect(route('register'))->with('fail','This Email Alredy Registered.');
	   }
	   return redirect(route('login'))->with('success','Registraion success.');
	   }
	      


  public function login(Request $request)
	      {

	      $validate=$request->validate([
	      'email'=>['required'],
          'password' =>['min:5'],
		  ]);
		  
	    $user =Login::where('email','=',$request->email)->first();
		
		if($user)
		{
			  if(Hash::check($request->password,$user->password))
			  {
				  $request->session()->put('auth',$user->id);
				  return redirect(route('dashboard'));
			  }
			  else
			  {
				 return redirect(route('login'))->with('fail','Password not Matches.');
			   }
		}
		else
		{
		  return redirect(route('login'))->with('fail','This email is not registered.');
		}
		 
	 }
	 	 
	 
	 public function dashboard(Request $request)
	{   
	     
		  $userid = session::get('auth');
		  $login = Login::find($userid);
		  $accountchkodr = Accountdetail::Where('userid', $userid);
		
		if(!empty($accountchkodr))
		{
			$accountchk =$accountchkodr->orderBy('id', 'desc')->get();
			$balancechk = $accountchk[0]->balance;
			$name = $accountchk[0]->name;
			$email = $accountchk[0]->email;
			
		}
		else
		{
			$name = $login->name;
			$email = $login->email;
			$balancechk = 0;

		}
               
		$data=compact('name','balancechk','email');
		//dd($data);
     
      //  }
	return view('admin/dashboard')->with($data);;
		//return "welcome to dash";
	}
	
	 public function statementuser(Request $request)
	{                                  
	    
		$userid = session::get('auth');
		$login = Login::find($userid);
		$accountchkodr = Accountdetail::Where('userid', $userid);
		
		if(!empty($accountchkodr))
		{
		 $user =$accountchkodr->orderBy('id', 'desc')->get();
		}
		else
		{
			$user = "";
		}
		$data=compact('user','login');
		return view('admin/statement')->with($data);
	}
	
	 public function depositpost(Request $request)
	{  
		
		//$login = Login::get();
		$userid = session::get('auth');
		$login = Login::find($userid);
		$accountchkodr = Accountdetail::Where('userid', $userid);
		//dd($accountchkodr);
         $amount = $request->post('deposit');
		 if(!empty($accountchkodr))
		 {
			
			$accountchk =$accountchkodr->orderBy('id', 'desc')->get();
			//dd($accountchk);
			$balancechk = $accountchk[0]->balance;
			$balance = $balancechk + $amount;
			//dd($balancechk);
			//dd($balance);

		 }
		 else{
			$balance =  $amount;

		 }

	   
	   if(!empty($amount))
	   {
		//dd($amount); 
		$deposit=new Accountdetail();
        $deposit->name = $login->name;
        $deposit->email = $login->email;
	    $deposit->type = "Credit"; 
		$deposit->details = "Deposit"; 
		$deposit->userid = $userid; 
		$deposit->amount = $amount;
		$deposit->balance = $balance; 
		$deposit->save();


		return redirect(route('depositget'))->with('success','Deposited successfully.');
	   }
	   else
	   {
		return redirect(route('depositpost'))->with('fail','Please enter amount.');
	   }
		
		return view('admin/deposit');
	}

	public function depositget(Request $request)
	{                                  
	   
	
		return view('admin/deposit');
	}
	 public function withdrawuser(Request $request)
	{                                  
	   
	
		return view('admin/withdraw');
	}
	public function withdrawpost(Request $request)
	{                                  
	   	
		$userid = session::get('auth');
		$login = Login::find($userid);
		$accountchkodr = Accountdetail::Where('userid', $userid);
		//dd($accountchk);
         $amount = $request->post('withdraw');
		 if(!empty($accountchkodr))
		 {
			$accountchk =$accountchkodr->orderBy('id', 'desc')->get();
			$balancechk = $accountchk[0]->balance;
			if($amount > $balancechk)
			{
				return redirect(route('withdrawpost'))->with('fail','Available balance is rupees '.$balancechk.' .');
			}
			$balance = $balancechk - $amount;
			//dd($balancechk);
			//dd($balance);

		 }
		 else{
			$balance =  $amount;

		 }

	   
	   if(!empty($amount))
	   {
		//dd($amount); 
		$deposit=new Accountdetail();
        $deposit->name = $login->name;
        $deposit->email = $login->email;
	    $deposit->type = "Withdraw"; 
		$deposit->details = "Withdraw"; 
		$deposit->userid = $userid; 
		$deposit->amount = $amount;
		$deposit->balance = $balance; 
		$deposit->save();


		return redirect(route('withdrawuser'))->with('success','withdrawed successfully.');
	   }
	   else
	   {
		return redirect(route('withdrawpost'))->with('fail','Please enter amount.');
	   }
		
	
		return view('admin/withdraw');
	}
	 public function transferuser(Request $request)
	{                                  
	   
	
		return view('admin/transfer');
	}
	public function transferpost(Request $request)
	{                                  
		$userid = session::get('auth');
		$login = Login::find($userid);
	
		$accountchkorder = Accountdetail::Where('userid', $userid);
		//dd($accountchk);
         $amount = $request->post('transfer');
		 $email = $request->post('email');
		 if($email == $login->email )
		 {
			return redirect(route('transferpost'))->with('fail','Please transfer amount to different user.');
		 }
		 $mailcheck =Login::where('email','=',$email)->first();
	if(!empty($mailcheck)) 
	{
		 if(!empty($accountchkorder))
		 {

			$accountchk= $accountchkorder->orderBy('id', 'desc')->get();
			$balancechk = $accountchk[0]->balance;
			if($amount > $balancechk)
			{
				return redirect(route('transferpost'))->with('fail','Available balance is rupees '.$balancechk.' .');
			}

			$balance = $balancechk - $amount;
			
		 }
		 else{
			$balance =  $amount;

		 }
		}
		else
		{
			return redirect(route('transferpost'))->with('fail','No user found in this email ID '.$email.'.');

		}
	   
	   if(!empty($amount))
	   {
		
		  
		$deposit=new Accountdetail();
        $deposit->name = $login->name;
        $deposit->email = $login->email;
	    $deposit->type = "Debit"; 
		$deposit->details =  "Transfer to ". $email; 
		$deposit->userid = $userid; 
		$deposit->amount = $amount;
		$deposit->transferto_email =  $email;
		$deposit->balance = $balance; 
		$deposit->save();


		if($mailcheck)
		{

			$accountoder1 = Accountdetail::Where('userid', $mailcheck->id);
			

			if(!empty($accountoder1))
			{
				$accountchk1 =$accountoder1->orderBy('id', 'desc')->get();
			   $balancechk1 = $accountchk1[0]->balance;
			   $balance1 = $balancechk1 + $amount;
			   //dd($balancechk);
			   //dd($balance);
			}
			else{
			   $balance1 =  $amount;
   
			}
			$transfer =new Accountdetail();
			$transfer->name = $mailcheck->name;
			$transfer->email = $mailcheck->email;
			$transfer->type = "Credit"; 
			$transfer->details =  "Transfer from ". $login->email; 
			$transfer->userid = $mailcheck->id; 
			$transfer->amount = $amount;
			$transfer->transferfrom_email =  $login->email;
			$transfer->balance = $balance1; 
			$transfer->save();

		}



		return redirect(route('transferuser'))->with('success','Transfered successfully.');
	   }
	   else
	   {
		return redirect(route('transferpost'))->with('fail','Please enter amount.');
	   }
	
		return view('admin/transfer');
	}
	
	
    public function logout()
    {
        if(Session::has('auth'))
        {
         session::pull('auth');
        }
       return redirect('admin/login')->with('success','you are logged out.');

    }
		
	
	

}	     
		 
		