<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
            
        }else{
            return redirect()->back()->with('errro','Login first Yourself');
        }
    }

    public function createData($data)
    {
        UserCreditCardInfo::create($data);
    }
}
