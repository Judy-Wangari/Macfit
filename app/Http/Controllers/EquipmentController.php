<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
     public function createEquipment(Request $request){
       $validated = $request->validate([
        'name'=>'required|string',
        'model_no'=>'required|string|unique:equipment,model_no',
        'usage'=>'required|string',
        'value'=>'required|numeric',
        'status'=>'required|in:available,in_use,maintenance,broken,retired'
       
       ]);

       $equipment = new Equipment();
       $equipment->name = $validated['name'];
       $equipment->model_no = $validated['model_no'];
       $equipment->usage = $validated['usage'];
       $equipment->value = $validated['value'];
       $equipment->status = $validated['status'];

        try{
             $equipment->save();
             return response()->json($equipment);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save Equipment',
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function readAllEquipment(){
        try{
            $equipment =Equipment::all();
            return response()->json($equipment);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch Equipment.',
                'message'=>$exception->getMessage()
            ]);
        }
    }
public function readEquipment($id){
    try{
        $equipment = Equipment::findOrFail($id);
        return response()->json($equipment);
    }
     catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to fetch the equipment.',
                'message'=>$exception->getMessage()
            ]);
        }
}

public function updateEquipment(Request $request, $id){
    $validated = $request->validate([
        'name'=>'required|string',
        'model_no'=>'required|string|unique:equipment,model_no,' . $id,
        'usage'=>'required|string',
        'value'=>'required|numeric',
        'status'=>'required|in:available,in_use,maintenance,broken,retired'
       ]);

    try{
        $existingEquipment = Equipment::findOrFail($id);

       $existingEquipment->name = $validated['name'];
       $existingEquipment->model_no = $validated['model_no'];
       $existingEquipment->usage = $validated['usage'];
       $existingEquipment->value = $validated['value'];
       $existingEquipment->status = $validated['status'];

       $existingEquipment->save();
        return response()->json($existingEquipment);
        }
        catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to save Equipment',
                'message'=>$exception->getMessage()
            ]);
        }

    }


    public function deleteEquipment($id){
        try{
            $equipment = Equipment::findOrFail($id);
            $equipment->delete();
            return response("Equipment deleted successfully");
        }
         catch(\Exception $exception){
            return response()->json([
                'error'=>'Failed to delete the Equipment',
                'message'=>$exception->getMessage()
            ]);
        }

    }
}
