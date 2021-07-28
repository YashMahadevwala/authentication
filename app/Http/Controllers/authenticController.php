<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\authentic;
use App\Models\todo;
use Illuminate\Support\Facades\Auth;


class authenticController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(Request $req)
    {
        // return $req;
        $valid = $req->validate([
            'name' => 'required | min:4',
            'email' => 'required | email | unique:authentic,email',
            'password' => 'required | min:4',
            'cpassword' => 'required | required_with:password|same:password|min:4'
        ],[
            'cpassword.required_with:password' => 'Password & Confirm Password Must Be Same' 
        ]);
        
        if($valid){

            $auth = new authentic;
            $auth->name = $req->name;
            $auth->email = $req->email;
            $auth->password = $req->password;
            $auth->save();

            return redirect('login')->with('reg','Registration Success');
        }

      
    }

    public function dashboard()
    {
        $data = todo::where('uid','=',session('uid'))->get();
        // return $data;
        return view('dashboard',compact('data'));
    }

    public function login()
    {
        return view('login');
    }

    public function logedin(Request $req)
    {
        // return "This is log in check";
        $valid = $req->validate([
            'email' => 'required | min:4',
            'password' => 'required | min:4',
        ]);

        if($valid){
           
            $data = authentic::where('email','=',$req->email)->first();
            // return $data;
            if(!$data){
                return back()->with('emailFail','Email Not Found');
            }else{
                if($req->password != $data->password){
                    return back()->with('passFail','Password Not Match');
                }else{
                    $req->session()->put('email', $data->name);
                    $req->session()->put('uid', $data->id);
                    return redirect('dashboard');
                }
            }

        }
    }

    public function logout(Request $req)
    {
        $req->session()->forget('email');
        return redirect('login');
    }


    public function addtodo(Request $req)
    {
        // return $req;
        $valid = $req->validate([
            'addtodo' => 'required | min:4',
        ],[
            'addtodo.required' => 'please add your task first'
        ]);

        if($valid){
            $addtodo = new todo;
            $addtodo->item = $req->addtodo;
            $addtodo->uid = session('uid');
            $addtodo->save();
            return back();
        }
    }

    public function removetodo($id)
    {
        // return $req;
        // return todo::find($id);
        todo::find($id)->delete();
        return back();
    }

}
