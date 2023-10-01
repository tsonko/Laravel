<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function __construct(){
        if (!auth()->check())
            return redirect('./');
    }

    public function overview()
    {
        $trucks = Trucks::all();
        return view('trucks', [
                'title' => 'Trucks Overview',
                'description'=>'Welcome to the trucks page!',
                'trucks'=>$trucks,
            ]
        );
    }

    public function getTrucks()
    {
        $trucks = Trucks::all();
        return datatables()->of($trucks)
            ->addColumn('deleteButton', '<button class="btn btn-xs btn-danger btn-delete">Delete</button>')
            ->rawColumns(['deleteButton'])
            ->toJson();

        //TODO
        //change the delete button with FORM
    }

    public function create(Request $request){

        $formData = $request->validate([
            'model'=>['required'],
            'reg_number'=>['required'],
        ]);

        // add striptag to each of the values
        foreach($formData as $key=>$value)
            $formData[$key] = strip_tags($value);

        // add the user who created the Truck
        $formData['user_id'] = auth()->id();

        Trucks::create($formData);

        return redirect('./trucks');
    }

    public function delete(Trucks $truck_id)
    {
        $truck_id->delete();
        return redirect('./trucks');
    }
}
