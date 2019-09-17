<?php

namespace App\Models\Financials;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'financial_wallets';

    protected $fillable = [
        'name',
        'value',
        'desc',
    ];

    public function incomes()
    {
        return $this->hasMany('App\Models\Financials\Income', 'wallet_id');
    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Financials\Expense', 'wallet_id');
    }
}
