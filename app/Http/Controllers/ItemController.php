<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $items=item::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $item = item::create([
        //     $request->all()
        // ]);
        $item=new item;
        $item->name=$request->item['name'];
        $item->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        $item=item::find($item->id);
        return $item->toJson();
        // return $item->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        $item=item::find($item->id);

        if($item){
            $item->completed=$request->item['completed'] ? true : false;
            $item->completed_at=$request->item['completed'] ? Carbon::now() : null;
            $item->save();
            return $item;
        }

        return "item not found";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $existingItem=item::find($item->id);

        if($existingItem){
            $existingItem->delete();
            return "success";
        }

        return "not found";
    }
}
