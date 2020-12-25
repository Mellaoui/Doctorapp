<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Redirect;
use PDF;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Consultation::factory()->create([])
    public function store(Request $request)
    {
        /*$url  = $_SERVER["PHP_SELF"];
        $path = explode("/", $url); 
        $last = end($path);

        $patient_id['patient_id'] = $last;
*/          
         $id = Patient::get('id');

        
      $result = Consultation::create( $request->validate(
            [
                'patient_id'=>$id,
                'title'=>'required',
                'description'=>'required'
            ]));
            
               //dd($cons);
            return Redirect::back()->with('message','Operation Successful !');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id ,Consultation $consultations)
    {
        //$consultations = $patient->consultations()->get();
        
        
            $consultations = $patient->consultations->get($id); //->map->only('id', 'name', 'city', 'phone'),
        
       /* $consultations = Consultation::findOrFail($id)->toArray();
        return Inertia::render('Consultation',['consultation'=>$consultations]);*/
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
    }
}
