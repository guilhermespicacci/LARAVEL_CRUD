<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shark;
use App\Models\Level;
class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $sharks = Shark::all();
        return view('sharks.index')
        ->with('sharks',$sharks)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('sharks.create')->with('levels',$levels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email:rfc,dns',
            'shark_level'=> 'required|string',
        ]);
        Shark::create($validatedData);
        return redirect()->route("sharks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shark = Shark::find($id);
        if($shark === null){
            return redirect()->route('fallback');
        }
        return view('sharks.show')->with('shark',$shark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $shark = shark::find($id);
          return view('sharks.edit')->with('shark',$shark);
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
        $validatedValues = $request->validate([
         'name' =>'required|max:30',
         'email'=> 'required|email:rfc,dns',
         'shark_level'=>'required',   
        ]);
        $shark = shark::find($id);
        $shark->name = $validatedValues['name'];
        $shark->email = $validatedValues['email'];
        $shark->shark_level = $validatedValues['shark_level'];
        $shark->save();
        return redirect(url("sharks/{$id}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shark = shark::find($id);
        $shark->delete();
        session()->flash("message","Your Shark has being deleted ;-;");
        return redirect(route("sharks.index"));
    }
}
