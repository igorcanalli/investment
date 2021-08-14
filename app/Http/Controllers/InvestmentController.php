<?php

namespace App\Http\Controllers;

use App\Events\InvestmentWasMade;
use App\Http\Requests\InvestmentFormRequest;
use App\Models\Currency;
use App\Models\Investment;

class InvestmentController extends Controller
{
    public function __construct()
    {
        if (!Currency::count()) {
            Currency::refreshApi();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencys = Currency::all();

        return view('investment.create', compact('currencys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestmentFormRequest $request)
    {
        $data = $request->only('value', 'currency_id', 'date_application');

        $data['user_id'] = auth()->id();

        $investment = Investment::create($data);

        InvestmentWasMade::dispatch($investment, auth()->user()->email);

        return redirect()->route('investment.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        $investiments = Investment::where('user_id', auth()->id())->get();

        return view('investment.show', compact('investiments', $investiments));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investment = Investment::find($id);

        $currencys = Currency::all();

        return view('investment.edit', compact('currencys', 'investment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update($id, InvestmentFormRequest $request)
    {
        $data = $request->only('value', 'currency_id', 'date_application');

        $data['user_id'] = auth()->id();

        Investment::where('id', $id)->update($data);

        return redirect()->route('investment.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Investment::where('id', $id)->delete();

        return redirect()->route('investment.show');
    }
}