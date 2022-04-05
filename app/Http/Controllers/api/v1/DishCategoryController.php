<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\DishCategory;
use App\Http\Controllers\Controller;

class DishCategoryController extends Controller
{
    // index
    public function index()
    {
        // Fetch all Dish Categories
        $data = DishCategory::latest()->get();
        if($data){
           return response()->json($data, 200); 
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get categories!',

            ], 400);
        }
    }

    // Show Data
    public function show($id)
    {
         $category = DishCategory::find($id);
         if(is_null($category)) {
             return response()->json([
                 'success' => false,
                 'message' => 'Category not found!'
             ], 400);
         }
         else {
             return response()->json([
                 'success' => true,
                 'data' => $category->toArray()
             ], 200);
         }
    }

    // Store Data
    public function store(Request $request)
    {
        //  Validate Data From input
        $fields = $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'required|string|'

        ]);

       //    Instantiate Dish Category Model
        $DishCategory = new DishCategory([

               'd_c_name'        => $fields['name'],
               'd_c_description' => $fields['description']
        ]);

        if($DishCategory->save()){

                 return response()->json([ 'success' => true, 'data' => $DishCategory ]);

        }
        else {
                return response()->json([ 'success' => 'false', 'message' => ' Could\'t add Category ']);
        }

          

          
       


    }

      // Update Data
    public function update()
    {
        // 
    }

      // Delete data
    public function destroy()
    {
        # code...
    }

    
    



}
