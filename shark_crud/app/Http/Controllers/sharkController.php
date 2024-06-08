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
        $idLevels = $sharks->pluck('foreign_id_level')->toArray();
        $levels = Level::whereIn("number_level", $idLevels )->get();
  
       
        
      
    foreach ($sharks as $shark) {
        foreach ($levels as $level) {
            if ($level->foreign_id_level == $shark->id_level) {
                $shark->level_name = $level->level;
                break;
            }
        }
    };
        return view('sharks.index')
        ->with('sharks',$sharks);
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
            'id_level'=> 'required|string',
        ]);
        Shark::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'foreign_id_level' => $validatedData['id_level'],
        ]);
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
        $foreign_key = $shark->foreign_id_level;
        $level = Level::find($foreign_key);
        $shark->level_name = $level->level;
        
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
          $shark = Shark::find($id);
          $levels = Level::all();
        
          return view('sharks.edit')
          ->with('shark',$shark)
          ->with('levels',$levels);
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
        $shark->foreign_id_level = $validatedValues['shark_level'];
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
