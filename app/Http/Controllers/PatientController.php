<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\Consultation;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Auth;
use PDF;

class PatientController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Auth::user();
        $user_id = $users->id;
        return Inertia::render('Add',['user_id'=>$user_id]);
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tenant_id['tenant_id']= session()->get('tenant_id');
       
        //$id = Auth::user()->id;
         //$id['user_id'] = auth()->id(); 
        //dd($id);
        //$user_id['user_id'] = $user->id;
     
            Patient::create([
                'name' => request('name'),
                'phone' => request('phone'),
                'user_id' => auth()->id()
            ]);
        
       /* Patient::create([
            $user_id,
            'name'=> $request->name,
            'phone'=>$request->phone
        ]);*/
        return redirect()->route('dashboard')->with('successMessage', 'Patient added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Consultation $consultations)
    {
        
        $patients = Patient::findOrFail($id)->toArray();
        //$consultations->patients()->get('title','description');
       // $consultations->select('title','description')->where('patient_id', $id)->get();
        $consultations = Consultation::select('title','description')->where('patient_id',$id)->get();
        //dd($consultations);
        return Inertia::render('Single', ['patients' => $patients ,'consultations'=> $consultations ]);
        //Inertia::share('patientName', $patients->name);
    }


    public function prescription($id, Consultation $consultations){

        $patients = Patient::findOrFail($id)->toArray();
        $consultations = Consultation::select('title','description')->where('patient_id',$id)->get();
        $pdf = PDF::loadView('prescription', ['consultations'=>$consultations]);

        return $pdf->download('prescription.pdf');
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
