<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Http\Request\StoreBrokerRequest;
use App\Http\Resources\BrokerResource;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BrokersResorces::collection(Broker::all());
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
    public function store(StoreBrokerRequest $request)
    {
        $request->validated();

        $broker = Broker::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'logo_path' => $request->logo_path,
        ]);

        return new BrokersResource($brokers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function show(Broker $broker)
    {
        if(!$broker) {
            return response()->json([
                'success' => false,
                'message' => 'Broker Dest Not Exist'
            ]);
        }

        return new BrokersResource($brokers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function edit(Broker $broker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Broker $broker)
    {
        $broker->update($request->only([
            'name', 'address', 'city','zip_code', 'phone_number', 'logo_path'
        ]));

        return new BrokesResiurce($broker);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broker  $broker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();

        if(!$broker) {
            return response()->json([
                'success' => false,
                'message' => 'Broker Does Not Exist',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Broker Has Been Deleted Successfully'
        ]);
    }
}
