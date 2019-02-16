<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Size;
use App\Color;
use App\Category;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$items = Item::all();
        $colors= Color::all();
        $sizes= Size::all();
        $categories = Category::all();
        $items = Item::orderBy('name','ASC')->paginate(3);
        return View('master-data.Items.index' , [ 'items'=>$items,'colors'=>'$colors','sizes'=>'$sizes','categories'=>'categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors= Color::all();
        $sizes= Size::all();
        $categories = Category::all();
        return view('master-data.items.create', [ 'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories]);
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
        Item::create([
            'name'=> $request->name,
            'category_id'=> $request->category_id,
            'size_id'=> $request->size_id,
            'color_id'=> $request->color_id,
            'qty'=> $request->qty,
            'barcode'=> $request->barcode,
            'serial'=> $request->serial,
            'price'=> $request->price,
            'other_costs'=> $request->other_costs,
            'profit_percent'=> $request->profit_percent,
            'sell_price'=> $request->sell_price,


        ]);

        return redirect(route('items.index'));

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
        $colors= Color::all();
        $sizes= Size::all();
        $categories = Category::all();
        $item = Item::find($id);
        return view('master-data.items.show', [ 'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories,'item'=>$item]);
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
     
        $colors= Color::all();
        $sizes= Size::all();
        $categories = Category::all();
        $item = Item::find($id);
        return view('master-data.items.edit', [ 'colors'=>$colors,'sizes'=>$sizes,'categories'=>$categories,'item'=>$item]);
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
        $item=Item::find($id);

        $item->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'size_id'=>$request->size_id,
            'color_id'=>$request->color_id,
            'qty'=>$request->qty,
            'barcode'=>$request->barcode,
            'serial'=>$request->serial,
            'price'=>$request->price,
            'other_costs'=>$request->other_costs,
            'profit_percent'=>$request->profit_percent,
            'sell_price'=>$request->sell_price,
       ]);
        return redirect(route('items.index'));

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
         //
         $item = Item::find($id);
         $item->delete();
         return redirect(route('items.index'));
    }
}
