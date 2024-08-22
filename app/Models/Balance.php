<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit($value)
    {

        $this->amount += number_format($value, 2, ".", "");
        $deposit = $this->save();

        if ($deposit) {
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
