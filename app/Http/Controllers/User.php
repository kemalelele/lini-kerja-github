<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class User extends Controller
{
    //
    public function index(){
       /* if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('home_user');
        }*/
    }
    public function getDataUser(){
        $client = new Client();
       /* $token = Session::get('token');*/
        $headers = [
          /*  'Authorization' => 'Bearer ' . $token, */       
            'Accept'        => 'application/json',
        ];
        $response = $client->request('GET', ENV('API').'pengguna', [
            'headers' => $headers
        ]);
        $responseData = json_decode($response->getBody()->getContents(),true);
        return $responseData;
    }  

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){

        /*$username = $request->username;
        $password = $request->password;

        $data = ModelUser::where('username',$username)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home_user');
            }
            else{
                return redirect('login')->with('alert','Password atau User Name, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau User Name, Salah!');
        }*/
        $client = new Client();
        $request['pil'] = 1;
        $url = ENV('API').'pengguna';
       /* $token = Session::get('token');*/
        $headers = [
          /*  'Authorization' => 'Bearer ' . $token, */       
            'Accept'        => 'application/json',
        ];
        try{
            $responseData = $client->request('POST',$url,[
                'headers' => $headers,
                'json' =>  $request->all()
            ]);
            $responseData = json_decode($responseData->getBody()->getContents(),true);
            Session::put ('email',$responseData['email'] );
            Session::put ('username',$responseData['username'] );
            return redirect('home_user');
        }catch(\Exception $e){
            return $e->getMessage();
        };        
    }

    public function home_user(){
        //ini aja gak masukkk
        return view('home_user');
        return $email.','.$username  ;
    }


    public function logout(){
        Session::flush();
        return redirect('login')->with('message','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('register');
    }

    public function registerPost(Request $request){
        /*$this->validate($request, [
            'username' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data =  new ModelUser();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');*/
        $client = new Client();
        $request['pil'] = 2;
        $url = ENV('API').'pengguna';
       /* $token = Session::get('token');*/
        $headers = [
          /*  'Authorization' => 'Bearer ' . $token, */       
            'Accept'        => 'application/json',
        ];
        try{
            $responseData = $client->request('POST',$url,[
                'headers' => $headers,
                'json' =>  $request->all()
            ]);
            $responseData = json_decode($responseData->getBody()->getContents(),true);
            return redirect('login');
        }catch(\Exception $e){
            return $e->getMessage();
        };

    }
}