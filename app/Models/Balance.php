<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit($value)
    {
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, ".", "");
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'I',
            'amount' => $value,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd')
        ]);

        if ($deposit && $historic) {
            return [
                'success' => true,
                'message' => 'Saldo depositado com sucesso.'
            ];
        }

        return [
            'success' => false,
            'message' => 'Falha ao depositar saldo.'
        ];
    }
}
