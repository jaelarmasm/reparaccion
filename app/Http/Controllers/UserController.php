<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use Illuminate\Support\Facades\Session;
use App\Contratista;

class UserController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authAPI:api',['only' => ['update', 'show','destroy','logout']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return null;   
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');                
        $credentials["password"]=$credentials["password"];  
        // dd($credentials);
        // dd(Auth::attempt($credentials));
        if (auth()->attempt($credentials)) {
            // Authentication passed...
            $token = Str::random(60);
            auth()->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();
            return auth()->user();
        }
        return [
            'failed' => 'No user register or no password match'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),            
            'password' => Hash::make($request->input('password')),
            'telefono' =>$request->input('telefono'),
            'direccion'=>$request->input('direccion'),
            'api_token' => Str::random(60),
        ]);        
        $role=Role::where('name',"user")->get();
        
        $user->roles()->attach($role);

        return $user;
    }

    /**
     * Display the specified resource.
     *     
     * @return \Illuminate\Http\Response
     */
    public function show()
    {    
         $contratista =Contratista::find(auth()->user()->contratistas);
        //  dd($contratista[0]);
         return ["user"=>auth()->user(),"contratista"=>auth()->user()->contratistas,"trabajos"=>$contratista[0] != null ? $contratista[0]->tipotrabajos : null];        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=auth()->user();                
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->username=$request->input('username');

        if($request->hasFile('avatar'))
        {
            $user->avatar=$request->file('avatar')->store('public/users');
        }                
        $user->roles()->attach($request->input('idRole'));
        $user->telefono=$request->input('telefono');
        $user->direccion=$request->input('direccion');
        $user->ubicacion=$request->input('ubicacion');        
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Session::flush(); 
        $user=Auth::user();
        $user->api_token=null;
        $user->save();

        Auth::guard("web")->logout();        
        return ['response'=>'ok'];
    }

    public function errlogin()
    {
        return [
            'failed' => 'No user login'];
    }
    
}
