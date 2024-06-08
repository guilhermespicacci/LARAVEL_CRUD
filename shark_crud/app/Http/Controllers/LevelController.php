<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        
        return view('levels.index')->with('levels',$levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

     
       $validatedData =  $request->validate([
            "shark_level"=> 'required|string|max:255',
            "number_level"=> 'required|string|max:255',
       ]);

      

      Level::create(
        [
            'level' => $validatedData['shark_level'],
            'number_level' => $validatedData['number_level']
        ]
       );
     return   redirect()->route('levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);
        return view('levels.show')->with('level', $level);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
         return view("levels.edit")->with('level', $level);

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
   
        $validatedData =  $request->validate([
            "shark_level"=> 'required|string|max:255',
            "foreign_id_level"=> 'required|string|max:255',
       ]);

           
        $level = Level::Find($id);
        
        $level->level = $validatedData["shark_level"];
        $level->foreign_id_level = $validatedData["foreign_id_level_level"];
        $level->save();
        return redirect()->route("levels.show",$id);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $level = Level::find($id);
       $level->delete();
       session()->flash("Your Shark has been Deleted");
       return redirect()->route('levels.index');
    }
}
