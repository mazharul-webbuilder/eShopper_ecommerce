<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function add(   )
    {
        return view('admin.unit.add');
    }

    public function create(Request $request)
    {
        Unit::getNewUnit($request);
        return redirect()->back()->with('message', 'Unit Created Successfully');
    }

    public function edit($id)
    {
        return view('admin.unit.edit', [
            'unit' => Unit::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        Unit::updateUnit($request, $id);
        return redirect('/manage-unit')->with('message', 'Unit Updated Successfully');

    }

    public function delete(Request $request, $id)
    {
        Unit::deleteUnit($id);
        return redirect('/manage-unit')->with('message', 'Unit Deleted Successfully');

    }

    public function manage(   )
    {
        return view('admin.unit.manage', [
            'units' => Unit::orderby('id', 'desc')->get()
        ]);
    }

}
