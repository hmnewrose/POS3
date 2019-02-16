<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\OfferDetails;
use App\OfferHeader;
use Illuminate\Support\Facades\DB;




class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $items = Item::orderBy('name','ASC')->paginate(4);

        $items = Item::all();
        $categories = Category::all();
        //$offerheader = OfferHeader::all();
         $offerheader = OfferHeader::orderBy('offername','ASC')->paginate(4);

        $offerdetails = OfferDetails::all();
       // dd($offerdetails);

        return view('master-data.offers.index',[
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $items = Item::all();
        $categories = Category::all();
        $offerheader = OfferHeader::all();
        $offerdetails = OfferDetails::all();

        return view('master-data.offers.create',[
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // dd($request->input());
       $request->validate([
        'offername' => 'unique:offer_headers',
        'start_date' => 'required',
        'expire_date' => 'required',

    ]);

    DB::transaction(function() use($request)
    {
        $offerheaders = OfferHeader::create($request->except('category_item'));
        //dd($request->input());
        foreach( $request->get('category_item') as $category_item )

            OfferDetails::create([
            'offer_header_id'  =>  $offerheaders->id,
            'item_id'  =>  $category_item['item_id'],
            'dis_item_value'  =>  $category_item['dis_item_value'],

        ]);
    });

    return redirect(route('offers.index'));

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
        $items = Item::all();
        $categories = Category::all();
        $offerheader=OfferHeader::find($id);
        $offerdetails = OfferDetails::all();

        return view('master-data.offers.show',[
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            ]);
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
        $items = Item::all();
        $categories = Category::all();
        $offerheader=OfferHeader::find($id);

        $offerdetails = OfferDetails::all();

        return view('master-data.offers.edit',[
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            ]);

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
        $request->validate([
            'offername' => 'required',
            'start_date' => 'required',
            'start_date' => 'required'
        ]);

       // dd($request->input());

        DB::transaction(function() use($request,$id)
        {

            $offerheader=OfferHeader::find($id);
            OfferDetails::Where('offer_header_id','=',$id)->delete();

           $offerheader->update($request->except('category_item'));
           foreach( $request->input('category_item') as $catitm )
           OfferDetails::create([
                'offer_header_id'  =>  $offerheader->id,
                'item_id'  =>  $catitm['item_id'],
                'dis_item_value'  =>  $catitm['dis_item_value'],
            ]);
        });

        return redirect(route('offers.index'));
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
        DB::transaction(function()use($id){

            $offerheader=OfferHeader::find($id);
            OfferDetails::Where('offer_header_id','=',$id)->delete();
            $offerheader->delete();

            });
            return redirect(route('offers.index'));
    }

        public function getitembycat($category_id){
            $category = Category::find($category_id);
            return $category->items;
            
        }
}
