<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $biodatas = Biodata::latest()->paginate(5);
  
        return view('biodatas.index',compact('biodatas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('biodatas.create');
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
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
        ]);
  
        Biodata::create($request->all());
   
        return redirect()->route('biodatas.index')
                        ->with('success','Biodata created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        //
        return view('biodatas.show',compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(Biodata $biodata)
    {
        //
        return view('biodatas.edit',compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biodata $biodata)
    {
        //
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
        ]);
  
        $biodata->update($request->all());
  
        return redirect()->route('biodatas.index')
                        ->with('success','Biodata updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        //
        $biodata->delete();
  
        return redirect()->route('biodatas.index')
                        ->with('success','Biodata deleted successfully');
    }
}
