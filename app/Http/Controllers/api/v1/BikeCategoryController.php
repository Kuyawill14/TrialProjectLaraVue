<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BikeCategory;
use App\Models\Bikes;
use Illuminate\Support\Facades\DB;

class BikeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
       //return BikeCategory::withCount("category_id")->get();
       return BikeCategory::withCount('bikes')
       ->get();
       /* return DB::table('bike_categories')
            ->leftJoin('bikes', 'bike_categories.category_id', '=', 'bikes.bike_category')
            ->withCount('category_id')
            ->get(); */
    }
    
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCategory = new BikeCategory();
        $newCategory->category = $request->get('category');
        $newCategory->description = $request->get('description');

        $newCategory->save();
        return $newCategory;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$DelCategory = BikeCategory::find($id)->category_id;

        $DelCategory = BikeCategory::find($id);

        if($DelCategory){
        
            $DelCategory->delete();
            return "Bike successfully deleted.";
        }
        return "Bike not found";
    }
}
