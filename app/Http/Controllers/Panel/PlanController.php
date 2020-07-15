<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function Add(Request $request)
    {
        return view('Panel.Plans.add');
    }

    public function Save(Request $request)
    {

        $plan = new Plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->days = $request->time;
        $plan->description = $request->desc;
        $plan->save();

        return redirect()->route('Panel.PlanList');
    }

    public function Edit($id)
    {
        return view('Panel.Plans.Edit', ['plan' => Plan::find($id)]);
    }

    public function SaveEdit($id)
    {

        Plan::whereId($id)->update([
            'name' => request()->name,
            'price' => request()->price,
            'days' => request()->time,
            'description' => request()->desc,

        ]);

        return redirect()->route('Panel.PlanList');
    }

    function list() {
        return view('Panel.Plans.list')->with('plans', Plan::all());
    }

    public function Delete(Request $request)
    {
        foreach ($request->array as $key => $id) {
            $plan = Plan::find($id);
            $plan->delete();
            return back();
        }
    }
}
