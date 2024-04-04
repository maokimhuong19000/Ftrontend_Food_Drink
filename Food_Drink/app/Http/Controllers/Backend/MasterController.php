<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
   public function __construct(){
      $this->middleware('auth');
      $this->middleware(function($req,$next){
         app()->setLocale(Auth::user()->language);
         return $next($req);
      });
   }

   public function master()
   {
      return view('backend.master');
   }

   public function registeration()
   {
      return view('backend.register');
   }

   public function registeruser(Request $req)
   {
      try {
         // Default validation rules
         $req->validate([
            'name' => 'required|string|max:191',
            'user_name' => 'required|string|max:191|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required' // Corrected key for password validation
         ]);

         // If validation passes, proceed with insertion
         $ins_user = [
            'name' => $req->name,
            'user_name' => $req->user_name,
            'email' => $req->email,
            'password' => hash::make($req->password), // Corrected key for password field
         ];

         // dd($ins_user);

         // Insert user into the database
         $i = DB::table('users')->insert($ins_user);

         if ($i) {
            return redirect()->back()->with('success_register', 'User registered successfully!');
         } else {
            return redirect()->back()->with('error_register', 'Failed to insert user!');
         }
      } catch (Exception $e) {
         return redirect()->back()->with('error', $e->getMessage());
      }

   }

   public function edituser($id){
      $user = DB::table('users')
      ->where('id', $id)
      ->first();
      return view ('backend.edituser',compact('user'));
   }
   
}