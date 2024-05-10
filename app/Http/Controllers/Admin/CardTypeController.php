<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\CardType;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Exception;

class CardTypeController extends Controller
{
    public function index()
    {
        $allCardTypes = CardType::all();
        $banks = Bank::all();
        return view('admin.card_type_main',[
            'allCardTypes' => $allCardTypes,
            'banks' => $banks
        ]);
    }

    public function store(Request $reqeust)
    {
        $reqeust->validate([
            'card_type_name' => 'required',
            'bank_id' => 'required',
            'active' => 'required',
        ]);
        $data = $reqeust->except([
            '_token',
        ]);
        CardType::create($data);
        return redirect()->back()->with('success','Card Type create successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'card_type_name' => 'required',
            'bank_id' => 'required',
            'active' => 'required',
            'card_id' => 'required',
        ]);

        $modelInstance = CardType::find($request->card_id);
        if($modelInstance){
            $data = $request->except([
                '_token',
                'card_id',
            ]);

            $modelInstance->update($data);
            return redirect()->back()->with('success','Card update successfully');
        }else{
            return redirect()->back()->with('error','Card not fount');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'card_id' => 'required'
        ]);

        $cardModelInstance = CardType::find($request->card_id);
        $cardModelInstance->delete();
        return redirect()->back()->with('success','Offer delete successfully');
    }

    public function getCards($bankId)
    {
        try{
            $cards = CardType::where('bank_id',$bankId)->get();
            return response()->json([
                'status' => true,
                'cards' => $cards
            ],200);
        }catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ],500);
        }
    }   
}
