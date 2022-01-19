<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Opportunity::latest()->paginate(5);
    
        return view('opportunities.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'state' => 'required',
            'description' => 'required',
        ]);
    
        Opportunity::create($request->all());
     
        return redirect()->route('opportunities.index')
                        ->with('success','Opportunity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show',compact('opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        return view('opportunities.edit',compact('opportunity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        $request->validate([
            'title' => 'required',
            'state' => 'required',
            'description' => 'required',
        ]);
    
        $opportunity->update($request->all());
     
        return redirect()->route('opportunities.index')
                        ->with('success','Opportunity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opportunity  $opportunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return redirect()->route('opportunities.index')
                        ->with('success','Opportunity deleted successfully.');
    }
    /**public function postuler($id){
        $Apply = new Apply();
        $Apply-> opportunity=$id;
        $Apply->employee=Auth::users()->id;
        $Apply-> save();
        return redirect()->route('opportunities.index')->with('success','Opportunity applied successfully.');
    } */
}
