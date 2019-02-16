<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Disty;

class DistyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $disties = Disty::all();
        $disties = Disty::orderBy('name','ASC')->paginate(3);
        return View('master-data.Distributors.index' , [ 'disties'=>$disties]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('master-data.Distributors.create');
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

        
        Disty::create([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'jop' => $request->jop,
            'type' => $request->type,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            
            ]);
        return redirect(route('disty.index'));

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
        $disty = Disty::find($id);
        return View('master-data.Distributors.show' , [ 'disty'=>$disty ]);
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
        $disty = Disty::find($id);
        return view('master-data.Distributors.edit',['disty'=>$disty]);

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
        // Disty::update([
        //     'name'=>$request->name,
        //     'phone'=>$request->phone,
        //     'address'=>$request->address,
        //     'email'=>$request->email,
        //    ]) ;
       
        $disty = Disty::find($id);
        $disty->update($request->input());
        return redirect(route('disty.index'))->with( ['success' => "Company {$disty->name} Updated Successfully.."]);


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
        $disty= Disty::find($id);
        $disty->delete();
        return redirect(route('Distributors.index'));
    }
}
