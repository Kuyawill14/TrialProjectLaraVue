<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bikes;
use App\Models\BikeCategory;
use Illuminate\Support\Facades\DB;
use File;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
      /*   $Bikes = Bikes::paginate(2);
        return $Bikes; */
        //return Bikes::orderBy('created_at', 'DESC')->get();
            
        $Bikes = DB::table('bikes')
            ->leftJoin('bike_categories', 'bikes.bike_category_categ_id', '=', 'bike_categories.categ_id')
            ->orderBy('bikes.created_at', 'DESC')
            ->paginate(10);

        return $Bikes;
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

    public function handle(Request $request)
    {
       
      /*   $pathToFile = $request->file('image')->store('images', 'public');
        return $pathToFile; */
      
           if($request->hasFile('image')){
               $file = $request->file('image');
                $file_name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('images'), $file_name);
                return response(['message'=>'File Success']);

           }
          
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*  $NewBike = new Bikes();
        $NewBike->bike_name = $request->item['name'];
        $NewBike->bike_category = $request->item['category'];
        $NewBike->bike_specs = $request->item['specs'];
        $NewBike->rent_price = $request->item['price'];
        $NewBike->availability = $request->item['availability']; */
    
        $NewBike = new Bikes();
        $NewBike->bike_name = $request->get('name');
        $NewBike->bike_category_categ_id = $request->get('category');
        $NewBike->bike_specs = $request->get('specs');
        $NewBike->rent_price = $request->get('rent');
        $NewBike->availability = $request->get('availability');

        $file = $request->file('image');
        if(!$file == ""){
        $file_name = time().'.'.$file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);
        $NewBike->img = $file_name;
        }
        else
        {
            $namefile = "noimage.jpg";
            $NewBike->img = $namefile;
        }
        $NewBike->save();
        //return $NewBike;
        return response(['message'=>$NewBike]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Finduser = Bikes::find($id);
        if($Finduser){
            
            return $Finduser;
        }
        return "User not found";
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
    public function update(Request $request,  $id)
    {   

        $UpdateBike = Bikes::find($id);
        if($UpdateBike){
           /*  $UpdateBike->bike_name = $request->item['name'];
            $UpdateBike->bike_category = $request->item['category'];
            $UpdateBike->bike_specs = $request->item['specs'];
            $UpdateBike->rent_price = $request->item['price'];
            $UpdateBike->availability = $request->item['availability']; */

            $UpdateBike->bike_name = $request->get('name');
            $UpdateBike->bike_category_categ_id =  $request->get('category');
            $UpdateBike->bike_specs =  $request->get('specs');
            $UpdateBike->rent_price =   $request->get('price');
            $UpdateBike->availability = $request->get('availability');
            

            
            $file = $request->file('image');
            if(!$file == null){
                $file_name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('images'), $file_name);
                $image = $UpdateBike->img;
                File::delete(public_path('images/'.$image));
                $UpdateBike->img = $file_name;
            }

            $UpdateBike->save();

           return response(['message'=>$UpdateBike]);
            
        }

        return response(['message'=>'error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $DelBike = Bikes::find($id);
        if($DelBike){
            $image = $DelBike->img;
            if(!$image == "noimage.jpg"){
                File::delete(public_path('images/'.$image));
            }
            $DelBike->delete();
            return "Bike successfully deleted.";
        }
        return "Bike not found";
    }
}