<?php

namespace App\Http\Controllers;

use App\Models\Carlist;
use App\Models\Charge;
use App\Models\Rate;
use App\Models\Washer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function cars(){
        $charges = Charge::all();
        $washers = Washer::all();
        $cars = Carlist::where('id','>',0)->orderByDesc('id')->get();
        return view('cars',[
            'charges'=>$charges,
            'washers'=>$washers,
            'cars'=>$cars

        ]);
    }
    public function getAmount(Request $request){
        $output = "";
        $amount= Charge::find($request->id);
        $output =$amount;

        return response($output);
    }
    public function washers(){
        $washers = Washer::all();
        return view('washers',[
            'washers'=>$washers
        ]);
    }
    public function payments(){
        $cars = Carlist::all();
        $washers = Washer::all();
        $mpesas = Carlist::where('payment_method',1)->get();
        $cashs = Carlist::where('payment_method',2)->get();
        return view('payments',[
            'cars'=>$cars,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs,
            'washers'=>$washers,

        ]);
    }
    public function charges(){
        $charges = Charge::all();
        $rate = Rate::find('1');
        return view('charges',[
            'charges'=>$charges,
            'rate'=>$rate
        ]);
    }
    public function addCharge(Request $request){
        $charge = new Charge();
        $charge->car_type = $request->input('car_type');
        $charge->car_amount = $request->input('car_amount');
        $charge->save();
        return redirect()->back()->with('success','CAR CHARGE ADDED SUCCESS');
    }
    public function addWashers(Request $request){
        $charge = new Washer();
        $charge->first_name = $request->input('first_name');
        $charge->last_name = $request->input('last_name');
        $charge->phone = $request->input('phone');
        $charge->save();
        return redirect()->back()->with('success','WASHER ADDED SUCCESS');
    }
    public function addCar(Request $request){
        $charge = new Carlist();
        $charge->date = Carbon::now()->format('d/m/Y');
        $charge->number_plate = $request->input('number_plate');
        $charge->phone = $request->input('phone');
        $charge->washer_id = $request->input('washer_id');
        $charge->amount = $request->input('amount');
        $charge->payment_method = $request->input('payment_method');
        $charge->save();
        $findRate = Rate::find('1');
        $getWasherAmount = Washer::find($request->input('washer_id'));
        $washerAmount=$getWasherAmount->amount;
        $rate = $findRate->rate;
        $final = ($rate / 100) * $request->input('amount');
        $finalAmount = $washerAmount+$final;

        $updateWasherAmount = Washer::where('id',$request->input('washer_id'))->update(['amount'=>$finalAmount,'rate'=>$rate]);
        return redirect()->back()->with('success','CAR ADDED SUCCESS');
    }
    public function eRate(Request $request){
        $rate = Rate::find('1');
        $rate->rate = $request->input('rate');
        $rate->save();
        return redirect()->back()->with('success','CAR CHARGE EDITED SUCCESS');
    }
    public function eCharge(Request $request){
        $edit = Charge::find($request->id);
        $edit->car_type = $request->input('car_type');
        $edit->car_amount = $request->input('car_amount');
        $edit->save();
        return redirect()->back()->with('success','CAR CHARGE EDITED SUCCESS');
    }
    public function eWashers(Request $request){
        $edit = Washer::find($request->id);
        $edit->first_name = $request->input('first_name');
        $edit->last_name = $request->input('last_name');
        $edit->phone = $request->input('phone');
        $edit->save();
        return redirect()->back()->with('success','WASHER EDITED SUCCESS');
    }
    public function editCharge(Request $request){
        $output = "";
        $charge = Charge::find($request->id);
        $output =$charge;

        return response($output);
    }
    public function editWasher(Request $request){
        $output = "";
        $washer = Washer::find($request->id);
        $output =$washer;

        return response($output);
    }
    public function editRate(Request $request){
        $output = "";
        $edit= Rate::find('1');
        $output =$edit;

        return response($output);
    }
}
