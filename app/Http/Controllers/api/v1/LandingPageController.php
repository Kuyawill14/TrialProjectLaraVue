<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bikes;
use App\Models\BikeCategory;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $category = BikeCategory::withCount('bikes')->get();
        $bikes = Bikes::all()->shuffle();
        
        $data = $category->shuffle();

        return ["category"=>$data, "bikes"=>$bikes];
    }

     public function sample()
    {
     
      
        $category = BikeCategory::withCount('bikes')->get();
         $bikes = Bikes::all()->shuffle();
         $data = $category->shuffle();

        $tempCategory = array();
        $tempBikes1 = array();
        $tempBikes2 = array();

        foreach ($data as $p) {
              $tempBikes1 = array();
            $counter = 0;
            if($p->bikes_count > 0){
                 
                   $tempCategory[] = $p;
                  foreach ($bikes as $a) {
                    if($a->bike_category_categ_id == $p->categ_id && $a->availability == "Available"  && $counter < 4){
                        $tempBikes1[] = $a;
                        $counter++;  
                    }
                    
                  }
                   $tempBikes2[] = $tempBikes1;
            }
           

            
        }

           return ["category"=>$tempCategory, "bikes"=>$tempBikes2];

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $FindBike = Bikes::find($id);
        if($FindBike){
          
            return $FindBike;
        }
        return "Bike not found";
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
        //
    }
}
