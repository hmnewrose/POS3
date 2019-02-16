<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use App\Category;
use App\Item;
use App\Color;
use App\Size;
use App\OfferDetails;
use App\OfferHeader;
use App\Sales_Invoice;
use App\Sales_Invoice_details;
use App\Customer;




class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        $items = Item::all();
        $categories = Category::all();
        $offerheader = OfferHeader::all();
        $offerdetails = OfferDetails::all();
        $salesinvoices = Sales_Invoice::all();
        $salesInvoicedetails = Sales_Invoice_details::all();
        return view('master-data.invoices.index',[
            'customers'=>$customers,
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            'salesinvoices'=> $salesinvoices,
            'salesInvoicedetails'=> $salesInvoicedetails,
            ]);
            // dd($salesinvoices->sales_invoice_details->item->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all();
        $items = Item::all();
        $color = Color::all();
        $size = Size::all();
        $categories = Category::all();
        $offerheader = OfferHeader::all();
        $offerdetails = OfferDetails::all();
        $salesinvoices = Sales_Invoice::all();
        $salesInvoicedetails = Sales_Invoice_details::all();
        return view('master-data.invoices.create',[
            'customers'=>$customers,
            'items'=>$items ,
            'color'=>$color ,
            'size'=>$size ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            'salesinvoices'=> $salesinvoices,
            'salesInvoicedetails'=> $salesInvoicedetails,
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
        //
        $request->validate([
            // 'offername' => 'unique:offer_headers',
            'Sales_date' => 'required',
            ]);
            DB::transaction(function() use($request)
            {
            $salesinvoices= Sales_Invoice::create($request->except('item_invoice'));

            //dd($salesinvoices->id);
            //dd($request->input());

            foreach($request->get('item_invoice') as $itminvoice)
           // dd($salesinvoices->id);
 
               Sales_Invoice_details::create([
                'sales_invoices_id ' => $salesinvoices->id,

                'item_id' => $itminvoice['item_id'],
                'offer_id' => $itminvoice['offer_id'],
                'offer_discount' => $itminvoice['offer_discount'],
                'qty' => $itminvoice['qty'],
                'other_discount' => $itminvoice['other_discount'],
                'itemnetprice' => $itminvoice['itemnetprice'],

                ]);
                //dd($salesinvoices->id);

            });
        return redirect(route('invoices.index'));

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
     
        $customers = Customer::all();
        $items = Item::all();
        $categories = Category::all();
        $offerheader = OfferHeader::all();
        $offerdetails = OfferDetails::all();
        $salesinvoice = Sales_Invoice::find($id);
        $salesInvoicedetails = Sales_Invoice_details::all();

        // dd($salesinvoice->id);
        return view('master-data.invoices.show',[
            'customers'=>$customers,
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            'salesinvoice'=> $salesinvoice,
            'salesInvoicedetails'=> $salesInvoicedetails,
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
        $customers = Customer::all();
        $items = Item::all();
        $categories = Category::all();
        $offerheader = OfferHeader::all();
        $offerdetails = OfferDetails::all();
        $salesinvoice = Sales_Invoice::find($id);
        $salesInvoicedetails = Sales_Invoice_details::all();

        // dd($salesinvoice->id);
        return view('master-data.invoices.edit',[
            'customers'=>$customers,
            'items'=>$items ,
            'categories'=>$categories,
            'offerheader'=>$offerheader,
            'offerdetails'=>$offerdetails,
            'salesinvoice'=> $salesinvoice,
            'salesInvoicedetails'=> $salesInvoicedetails,
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
        // DB::transaction(function()use($id){
        //     $offerheader=OfferHeader::find($id);
        //     OfferDetail::Where('offer_header_id','=',$id)->delete();
        //     $offerheader->delete();
        //     });
        //     return redirect(route('offers.index'));

        DB::transaction(function()use($id){
            $salesinvoice=Sales_Invoice::find($id);
            Sales_Invoice_details::Where('sales_invoices_id','=',$id)->delete();
            $salesinvoice->delete();
            });
        return redirect(route('invoices.index'));


    }

    public function getitem($catid){
        $category = Category::find($catid);
        return $category->items;
      
    }

    public function getitemvalues($itemid)
    {
        $item = Item::find($itemid);
        
        return ($item);
    }

    public function getitemcolor($colorid)
    {
        $color = Color::find($colorid);
        return ($color);
    }

    public function getitemsize($sizeid)
    {
        $size = Size::find($sizeid);
        return ($size);
    }

    public function getoffers($id) {
        $offer =OfferDetails::where("item_id",$id)->get()->map(function($offerdetails){
            return [
                "id" => $offerdetails->offer_header->id ,
                "name" => $offerdetails->offer_header->offername,
                "start_date" => $offerdetails->offer_header->start_date,
                "expire_date" => $offerdetails->offer_header->expire_date

                ];
        });
        return ($offer);

    }

    public function getofferdiscount($offerId,$itemid){
      // $offerd = OfferDetails::find($offerId);
    //    $offer =OfferDetails::where("offer_id",$offerId)->get()->map(function($offerdetails){


    //     // dd($offerd->offer_discount);
     //return ($offerd);

        $offerd = OfferDetails::Where("offer_header_id",$offerId)->where('item_id',$itemid)->get()->map(function($offerdetails){
                // 
          //return ["dis_item_value"=>optional($offerdetails->dis_item_value)];
        //  return ["offer_dis"=>optional($offerdetails->dis_item_value),
        //          "item_id"=>$offerdetails->item_id
        
        // ];
        return $offerdetails->dis_item_value;
        });
        //dd($offerd);
         return ($offerd);
                
 
    }


}
