<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Helper\Main;


class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('admin.bank_create',[
            'banks' => $banks,
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
            $data['image'] = Main::storeFile($request->image,'admin/bank/');
        }   

        Bank::create($data);

        return redirect()->back()->with('success','Bank create successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:200',
            'bank_id' => 'required'
        ]);

        $bankModelInstance = Bank::find($request->bank_id);
        $data = $request->except([
            '_token',
            'image'
        ]);

        if ($request->image) {
            $data['image'] = Main::storeFile($request->image,'admin/bank/');
        }   
        $bankModelInstance->update($data);
        return redirect()->back()->with('success','Bank update successfully');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'bank_id' => 'required'
        ]);
        $bankModelInstance = Bank::find($request->bank_id);
        $bankModelInstance->delete();
        return redirect()->back()->with('success','Bank delete successfully');
    }
}
