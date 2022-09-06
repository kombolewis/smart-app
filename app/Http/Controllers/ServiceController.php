<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ratings = Service::all(['rating']);


        $good = $ratings->where('rating','good')->first() ? $ratings->where('rating','good') : false;
        $fair = $ratings->where('rating','fair')->first() ? $ratings->where('rating','fair') : false;
        $bad = $ratings->where('rating','bad')->first() ? $ratings->where('rating','bad') : false;
        $neutral = $ratings->where('rating','neutral')->first() ? $ratings->where('rating','neutral') : false;
        
        $results = [
            [
                'choice' => 'Good',
                'percentage' => ($good) ? ($good->count() / $ratings->count()) * 100 : 0,
                'count' => $good ? $good->count() : 0
            ],
            [
                'choice' => 'Bad',
                'percentage' => $bad ? ($bad->count() / $ratings->count()) * 100 : 0,
                'count' => $bad ? $bad->count() : 0
            ],
            [
                'choice' => 'Fair',
                'percentage' => $fair ? ($fair->count() / $ratings->count()) * 100 : 0,
                'count' => $fair ?  $fair->count() : 0
            ],
            [
                'choice' => 'Neutral',
                'percentage' => $neutral ? ($neutral->count() / $ratings->count()) * 100 : 0,
                'count' => $neutral ? $neutral->count() : 0
            ]
        ];
        return response()->json($results);
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
        $service = Service::create($request->post());
        return response()->json([
            'message' => 'Rating submitted Successfully',
            'service' => $service
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
