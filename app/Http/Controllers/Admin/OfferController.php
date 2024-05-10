<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Offers;
use App\Models\PaymentPlatforms;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offers::all();
        $banks = Bank::all();
        $paymentPlatforms = PaymentPlatforms::all();
        return view('admin.offer.listing',[
            'offers' => $offers,
            'banks' => $banks,
            'paymentPlatforms' => $paymentPlatforms,
            'i' => 1
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required',
            'payment_platform_id' => 'required',
            'min_amount' => 'required',
            'description' => 'required'
        ]);

        $data = $request->except([
            '_token'
        ]);

        Offers::create($data);
        return redirect()->route('admin.create.offer')->with('success','Offer save successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'bank_id' => 'required',
            'payment_platform_id' => 'required',
            'description' => 'required',
            'min_amount' => 'required',
            'offer_id' => 'required',
        ]);

        $data = $request->except([
            '_token'
        ]);

        $modelInstance = Offers::find($request->offer_id);
        $modelInstance->update($data);
        return redirect()->back()->with('success','offer update successfully');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'offer_id' => 'required'
        ]);

        $offerModelInstance = Offers::find($request->offer_id);
        $offerModelInstance->notDeleteFullyKeepRecord();
        return redirect()->back()->with('success','Offer delete successfully');
    }
}
