<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
Use App\UserPhone;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userphones =UserPhone::all();
        $users = User::all();
        //$users = \App\User::paginate(4);

      //  $users = User::orderBy('name','ASC')->paginate(3);
        return View('master-data.users.index' , [ 'users'=>$users, 'userphones'=>'$userphones']);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('master-data.users.create');
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
       // $user = User::create($request->input());
       DB::transaction(function() use($request)
       {
       $password = bcrypt($request->get('password'));
       $request->offsetSet('password' , $password);
       $user = User::create($request->except('phones'));
       foreach( $request->get('phones') as $phone )
            UserPhone::create([
                'user_id' => $user->id,
                'phone_type'  =>  $phone['phone_type'],
                'phone_no'  =>  $phone['phone_no'],
                'isprimary'  =>  isset($phone['isprimary']) ? 1 : 0,

                ]);
            });
        return view('master-data.users.index',['users'=>User::all()]);
        // return redirect(route('users.index'))->with( ['success' => "user {$user->name} Created Successfully."]);
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
        $userphones =UserPhone::all();
        $user = User::find($id);
        return View('master-data.users.show' ,[ 'user'=>$user, 'userphones'=>'$userphones']);
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
        $userphones =UserPhone::all();
        $user = User::find($id);
        return View('master-data.users.edit' , [ 'user'=>$user, 'userphones'=>'$userphones']);
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
        // $user = User::find($id);
        // $user->update($request->input());

        DB::transaction(function() use($request,$id)
      {
          $user=User::find($id);

          UserPhone::Where('user_id','=',$id)->delete();

          $user->update($request->except('phones'));
          foreach( $request->input('phones') as $phone )
             UserPhone::create([
                  'user_id'  => $user->id,
                  'phone_type'  =>  $phone['phone_type'],
                  'phone_no'  =>  $phone['phone_no'],
                  'isprimary'  =>  isset($phone['isprimary']) ? 1 : 0,


          ]);
      });

        return redirect(route('users.index'));
        // ->with( ['success' => "user {$user->name} Updated Successfully."]);
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
        $user= User::find($id);
        $user->delete();
        return redirect(route('users.index'))->with(['success' => "user {$user->name} deleted Successfully."]);
    }
}
