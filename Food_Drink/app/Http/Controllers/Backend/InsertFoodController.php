<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\InsertFood;
use Auth;
use Illuminate\Http\Request;
use App\Models\InsertData;
use Exception;
use Illuminate\Support\Facades\DB;

class InsertFoodController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($req,$next){
           app()->setLocale(Auth::user()->language);
           return $next($req);
        });
     }
    //add data
    public function insert(Request $req)
    {
        $cfood['cfood'] = DB::table('food_category')
            ->select('food_category_id', 'food_category_name')
            ->get();
        return view('backend.insertdata', $cfood);
    }

    public function save(Request $req)
    {
        // Validate the request
        $req->validate([
            'food_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle file upload
            if ($req->hasFile('food_img')) {
                $image = $req->file('food_img');
                $imageName = 'frontend/assets/images/' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('frontend/assets/images'), $imageName);
            }

            // Create the food data array
            $fdata = [
                'food_id' => $req->food_id,
                'food_name' => $req->food_name,
                'price' => $req->price,
                'food_status' => $req->food_status,
                'food_desc' => $req->food_desc,
                'food_category_id' => $req->food_category_id,
                'food_img' => $imageName,
                // Add the image name to the data array
            ];

            // Insert data into the database
            // dd($req->all());
            $i = DB::table('food_menu')->insert($fdata);
            if ($i) {
                return redirect('admin/button')->with('success', 'Insert Success');
            }
        } catch (Exception $e) {
            return redirect('admin/button')->with('error', 'Insert Failed: ' . $e->getMessage());
        }
    }
    //end add data
    // edit
    public function edit($id)
    {
        $food = DB::table('food_menu')
            ->where('food_id', $id)
            ->first();

        $cfood['cfood'] = DB::table('food_category')
            ->select('food_category_id', 'food_category_name')
            ->get();
        return view('backend.edit', ['food' => $food], $cfood);
    }
    // end edit
    public function update(Request $request)
    {
        // Validate the form data

        $request->validate([
            'food_name' => 'required',
            'price' => 'required|numeric',
            'food_category_id' => 'required',
            'food_status' => 'required',
            'food_desc' => 'required',
        ]);

        // Retrieve the food record from the database based on the food_id

        $food = DB::table('food_menu')
            ->where('food_id', $request->input('food_id'))
            ->first();

        // Check if the food record exists

        if (!$food) {
            return redirect()->back()->with('error', 'Food not found');
        }
        if ($request->hasFile('food_img')) {
            $image = $request->file('food_img');
            $imageName = 'frontend/assets/images/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/assets/images'), $imageName);
    
            // Delete the old image file if it exists
            if (file_exists(public_path($food->food_img))) {
                unlink(public_path($food->food_img));
            }
        } else {
            // Keep the existing image if no new image is provided
            $imageName = $food->food_img;
        }
        // Update the food record with the new data

        DB::table('food_menu')
            ->where('food_id', $request->input('food_id'))
            ->update([
                'food_name' => $request->input('food_name'),
                'price' => $request->input('price'),
                'food_category_id' => $request->input('food_category_id'),
                'food_status' => $request->input('food_status'),
                'food_desc' => $request->input('food_desc'),
                'food_img' => $imageName,
            ]);

        // Redirect with success message

        return redirect()->back()->with('success', 'Food updated successfully');
    }
    public function destroy($id)
    {
        // Find the item by ID

        $i = DB::table('food_menu')
            ->where('food_id', $id)
            ->update(['food_active' => '0']);

        //    dd($id);

        return redirect('admin/table')->with('success', 'Data has been deleted successfully.');
    }
    public function search(Request $request)
    {
        // Get the search query from the request

        $q_search = $request->input('q_search');

        // Perform the search query

        $food = DB::table('food_menu')
            ->where('food_name', 'like', '%' . $q_search . '%')
            ->orWhere('food_desc', 'like', '%' . $q_search . '%')
            ->orWhere('price', 'like', '%' . $q_search . '%')
            ->paginate(4);
        return view('backend.table', ['food' => $food]);
    }


}