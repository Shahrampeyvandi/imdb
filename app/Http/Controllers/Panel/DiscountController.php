<?php

namespace App\Http\Controllers\Panel;

use App\Discount;
use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    function list() {
        return view('Panel.Discounts.list')->with('discounts', Discount::all());
    }

    public function Save(Request $request)
    {

        if (Discount::where('d_code', $request->code)->count()) {
            return back();
        }
        if (Plan::count() == 0) {
            return back();
        }

        $discount = new Discount;
        $discount->name = $request->title;
        $discount->percent = $request->percent;
        $discount->expire_date = $this->convertDate($request->date);
        $discount->d_code = $request->code;
        $discount->description = $request->description;
        $discount->save();

        if ($request->for == 'all') {
            $plans_id = Plan::all()->pluck('id')->toArray();
            $discount->plan()->attach($plans_id);
        } else {
            $discount->plan()->attach($request->for);
        }

        return redirect()->route('Panel.DiscountList');
    }

    public function Edit($id)
    {
       
        return view('Panel.Discounts.Edit',['discount'=> Discount::find($id)]);
    }

    public function SaveEdit($id)
    {
        
        Discount::whereId($id)->update([
            'name' => request()->title,
            'd_code' => request()->percent,
            'percent' => request()->code,
            'expire_date' => $this->convertDate(request()->date),
            'description' => request()->description,
        ]);

        return redirect()->route('Panel.DiscountList');
    }
}
