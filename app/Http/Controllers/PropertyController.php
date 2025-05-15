<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PropertiesResorces::collection(Property::all());
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
    public function store(StorePropertyRequest $request)
    {
        $request->validated();

        $property =Property::create([
            'broker_id' => $request->broker_id,
            'address' => $request->address,
            'listing_type' => $request->listing_type,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'build_year' => $request->build_year,
        ]);

        $property->characteristic()->create([
            'property_id' => $request->property_id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status,
        ]);

        return PropertiesResorces::collection($property);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        if($property) {
            return respons()->json([
                'status' => false,
                'message' => 'Property Not Found'
            ]);
        }
        return PropertiesResorces::collection($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $broker->update($request->only([
            'broker_id', 'address', 'listing_type','city','zip_code', 'description', 'build_year'
        ]));

        $property->characteristic->where('property_id', $property->id)->update($request->only([
             'properyt_id', 'price', 'bedrooms', 'bathrooms','sqft','price_sqft', 'property_type', 'status'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        if(!$broker) {
            return response()->json([
                'success' => false,
                'message' => 'Property Does Not Exist',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Property Has Been Deleted Successfully'
        ]);
    }
}
