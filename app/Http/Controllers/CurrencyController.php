<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class CurrencyController extends Controller
{
    public function update()
    {
        $currencys = Currency::refreshApi();

        return view('currency.update', compact('currencys'));
    }

}
