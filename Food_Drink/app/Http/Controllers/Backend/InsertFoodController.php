<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\InsertFood;
use Illuminate\Http\Request;
use App\Models\InsertData;
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
        $inser_food = InsertFood::all();
        $fdata = $req->except('_token');

        // dd($data);
        $fdata = array(
            'food_id' => $req->food_id,
            'food_name' => $req->food_name,
            'price' => $req->price,
            'food_status' => $req->food_status,
            'food_desc' => $req->food_desc,
            'food_category_id' => $req->food_category_id
        );
        $i = DB::table('food_menu')->insert($fdata);
        if ($i) {
            return redirect('admin/table')->with('sucess', 'data has been insert');
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
