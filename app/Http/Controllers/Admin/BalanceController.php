<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MoneyValidationFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\User;
use Illuminate\Http\Request;

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

    public function transfer()
    {
        return view('admin.balance.transfer');
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

    public function transferReceiver(Request $request, User $user)
    {
        if (!$sender = $user->getSender($request->sender)) {
            return redirect()
                ->back()
                ->with('error', 'Nenhum usuário encontrado com os dados informados.');
        }

        if ($sender->id == auth()->user()->id) {
            return redirect()
                ->back()
                ->with('error', 'Não é possível efetuar transferência para o mesmo titular da conta.');
        }

        $balance = auth()->user()->balance;

        return view('admin.balance.transferReceiver', compact('sender', 'balance'));
    }

    public function transferConfirm(MoneyValidationFormRequest $request, User $user)
    {
        if (!$sender = $user->find($request->sender_id))
            return redirect()
                ->route('balance.transfer')
                ->with('success', 'Recebedor Não Encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if ($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);


        return redirect()
            ->route('balance.transfer')
            ->with('error', $response['message']);
    }

}
