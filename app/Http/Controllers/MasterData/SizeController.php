<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sizes = Size::orderBy('size_name','ASC')->paginate(4);
        return view('master-data.sizes.index',['sizes'=>$sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('master-data.sizes.create');
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
    //    $size = Size::create($request->input());
    //     return redirect(route('sizes.index'));

    Size::create([
        'size_name' => $request->size_name,
        ]);
    return redirect(route('sizes.index'))->with( ['success' => "Size Created Successfully."]);
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

        $this->validate($request,[
            'size_name'=>'required',
           ]);

        $size = Size::find($id);
        $size->update($request->input());
        return redirect(route('sizes.index'))->with( ['success' => "Size {$size->size_name} Updated Successfully."]);
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
        // $size = Size::find($id)->delete();
        // return redirect(route('sizes.index'))->with( ['success' => "The Size {$size->size_name} Deleted Successfully."]);
    }

    public function deletesize(Request $request)
    {
        $id = $request->get('id');
        // dd($id);
        $size= Size::find($id);
        $size->delete();
        return "Deleted";
        //return redirect(route('sizes.index'))->with( ['success' => "Size {$size->size_name} Deleted Successfully."]);


    }


    public function updatesize(Request $request)
    {
        $id = $request->get('id');

        $size= Size::find($id);

        $size->update([
            'size_name' => $request->size_name,
        ]);
        return $size;

    }

}
