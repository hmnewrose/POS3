<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors = Color::orderBy('color_name','ASC')->paginate(4);
        return view('master-data.colors.index',['colors'=>$colors]);
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
        Color::create([
            'color_name'=>$request->color_name,
        ]);
        return redirect(route('colors.index'))->with( ['success' => "Color Created Successfully."]);

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
        //
    }

    public function deletecolor(Request $request)
    {
        $id = $request->get('id');
        // dd($id);
        $color= Color::find($id);
        $color->delete();
        return "Deleted";
        //return redirect(route('colors.index'))->with( ['success' => "Color {$color->color_name} Deleted Successfully."]);


    }

    public function updatecolor(Request $request)
    {
        $id = $request->get('id');

        $color= Color::find($id);

        $color->update([
            'color_name' => $request->color_name,
        ]);
        return $color;

    }


}
