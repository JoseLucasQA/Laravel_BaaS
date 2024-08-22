<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MoneyValidationFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function depositConfirm(MoneyValidationFormRequest $request, Balance $balance)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }

    public function withdrawConfirm(MoneyValidationFormRequest $request, Balance $balance)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success']) {
            return redirect()->route('admin.balance')->with('success', $response['message']);
        }

        return redirect()->back()->with('error', $response['message']);
    }
}
