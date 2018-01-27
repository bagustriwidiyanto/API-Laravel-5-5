<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = \DB::table('employes')->orderBy('id','desc')->paginate(20);

        return response()->json($employes);
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
        $employe = new \App\Employe;
        $employe->name = $request->name;
        $employe->address = $request->address;
        $employe->jenis_kelamin = $request->jenis_kelamin;
        $employe->email = $request->email;
        $employe->age = $request->age;
        $employe->save();

        return $employe;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Employe::find($id);
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
        $employe = \App\Employe::find($id);

        $employe->name = $request->name;
        $employe->address = $request->address;
        $employe->jenis_kelamin = $request->jenis_kelamin;
        $employe->email = $request->email;
        $employe->age = $request->age;
        $employe->save();

        return $employe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = \App\Employe::find($id);
        $employe->delete();
    }
}
