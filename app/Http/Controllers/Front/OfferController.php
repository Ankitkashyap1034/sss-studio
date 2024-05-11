<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\UserCreditCardInfo;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'credit_card_bank' => 'required', 
            'credit_card_type' => 'required', 
            'amount' => 'required', 
        ]);
        
        if(Auth::user()){
            $data = $request->except([
                '_token'
            ]);
            $data['user_id'] = Auth::user()->id;
            $this->createData($data);
        
            $offers = Offers::where('bank_id',$request->credit_card_bank)
                                ->where('active',1)
                                ->where('card_type_id',$request->credit_card_type)
                                ->where('min_amount','<=',$request->amount)
                                ->get();

            return view('front.filter-offers',[
                'offers' => $offers
            ]);
        }else{
            return redirect()->back()->with('errro','Login first Yourself');
        }
    }

    public function createData($data)
    {
        UserCreditCardInfo::create($data);
    }
}
