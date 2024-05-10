<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentPlatforms;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use App\Helper\Main;
use Nette\Utils\Json;

class PaymentPlatformsController extends Controller
{
    public function index()
    {
        $paymentPlatform = PaymentPlatforms::all();
        return view('admin.payment_platform_main',[
            'paymentPlatform' => $paymentPlatform,
            'i' => 1
        ]);
    }

    public function store(Request $request) 
    { 
        $request->validate([
            'name' => 'required|min:2|max:200',
            'image' => 'required'
        ]);

        $data = $request->except([
            '_token',
            'image'
        ]);
        if ($request->image) {
            $data['image'] = Main::storeFile($request->image,'admin/payment/');
        }   

        PaymentPlatforms::create($data);
        return redirect()->back()->with('success','Payment Platform create successflly');        
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:200',
            'payment_id' => 'required'
        ]);

        $paymentPlatform = PaymentPlatforms::find($request->payment_id);
        $data = $request->except([
            '_token',
            'image'
        ]);

        if ($request->image) {
            $data['image'] = Main::storeFile($request->image,'admin/payment/');
        }   
        $paymentPlatform->update($data);
        return redirect()->back()->with('success','Payment Platform update successfully');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'bank_id' => 'required'
        ]);

        $paymentPlatform = PaymentPlatforms::find($request->bank_id);
        $paymentPlatform->delete();
        return redirect()->back()->with('success','Payment platform delete successfully');

    }
}
