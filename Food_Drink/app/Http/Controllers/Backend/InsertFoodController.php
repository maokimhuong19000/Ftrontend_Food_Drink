<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\InsertFood;
use Illuminate\Http\Request;
use App\Models\InsertData;
use Exception;
use Illuminate\Support\Facades\DB;

class InsertFoodController extends Controller
{
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
            // Add other validation rules for your fields here
        ]);

        try {
            // Handle file upload
            if ($req->hasFile('food_img')) {
                $image = $req->file('food_img');
                $imageName ='frontend/assets/images/' . time() . $image->getClientOriginalExtension();
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
                'food_img' => $imageName // Add the image name to the data array
            ];

            // Insert data into the database
            $i = DB::table('food_menu')->insert($fdata);
            if ($i) {
                return redirect('admin/button')->with('success', 'Data has been inserted.');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id)
    {
        // Find the item by ID
        $food = InsertFood::findOrFail($id);

        // Delete the item
        $deleted = $food->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Food item deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete food item.');
        }
    }
}
