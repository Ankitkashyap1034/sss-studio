<?php

namespace App\Http\Controllers\Front;

use App\Helper\Main;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Offers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allBanks = Bank::where('active','1')->get();
        return view('front.index',[
            'allBanks' => $allBanks
        ]);
    }

    public function offer()
    {
        $allBanks = Bank::where('active','1');
        $offers = Main::get_offers();
        return view('front.offer',[
            'allBanks' => $allBanks,
            'page' => 'Offers',
            'offers' => $offers,
        ]);
    }
}
