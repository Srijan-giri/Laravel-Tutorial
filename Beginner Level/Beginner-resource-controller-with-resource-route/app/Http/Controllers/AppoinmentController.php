<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appoinments = Appoinment::all();
        return response()->json($appoinments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $data['date']=Carbon::now()->format('Y-m-d H:i:s');
        $data['email']=$request->email;
        $data['phone']=$request->phone;

        $appoinment = Appoinment::create($data);
        return response()->json(['message' => 'Appoinment created successfully',
                                 'appoinments' => $appoinment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appoinment = Appoinment::findOrFail($id);
        return response()->json($appoinment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appoinment = Appoinment::findOrFail($id);
        $appoinment->name = $request->name;
        $appoinment->date = Carbon::now()->format('Y-m-d H:i:s');
        $appoinment->email = $request->email;
        $appoinment->phone = $request->phone;

        $appoinment->save();
        return response()->json(['message' => 'Appoinment updated successfully',
                                 'appoinments' => $appoinment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Appoinment::destroy($id);
        return response()->json(['message' => 'Appoinment deleted successfully']);
    }
}
