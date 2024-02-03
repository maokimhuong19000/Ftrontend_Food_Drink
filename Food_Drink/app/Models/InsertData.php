<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsertData extends Model
{
    // Assuming 'food_category' is the actual table name
    protected $table = 'food_category';

    // Assuming 'food_category_id' is the primary key
    protected $primaryKey = 'food_category_id';

    // Other model properties and methods...

    // Define a function to get the name based on the ID
    public static function getCategoryNameById($foodCategoryId)
    {
        $foodCategory = self::find($foodCategoryId);

        return $foodCategory ? $foodCategory->food_category_name : null;
    }
}
