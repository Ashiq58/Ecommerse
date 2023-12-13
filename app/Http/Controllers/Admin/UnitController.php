<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $imageName,$image,$imageUrl;
    public function createUnit(){
        return view("admin.unit.create");
    }
    public function storeUnit(Request $request){

         $request->validate([
            'name' => 'required',
            //  dimensions:max_width=300,max_height=300
        ]);
        $unit = new Unit();

        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();
        return redirect()->back()->with('message','unit Create Successfully');
    }
    public function manageUnit(){
        $units = unit::all();
        return view('admin.unit.manage')->with(compact('units'));
    }
    public function editunit($id){
        $unit = unit::find($id);
        return view('admin.unit.edit')->with(compact('unit'));
    }
    public function updateUnit(Request $request){
        $unit = unit::find($request->unit_id);

        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();
        return redirect()->route('unit.manage')->with('message','unit Update Successfully');
    }
    public function deleteUnit($id){
        $unit = unit::find($id);
        if(file_exists($unit->image))
        unlink($unit->image);
        $unit->delete();
        return redirect()->route('unit.manage')->with('message','Delete Successfully');
    }
}
