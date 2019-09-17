<?php

namespace App\Models\Financials;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'financial_expenses';

    protected $fillable = [
        'wallet_id',
        'value',
        'category_id',
        'purpose',
        'receiver',
        'datetime_trx',
        'attachment',
    ];

    public function wallets()
    {
        return $this->belongsTo('App\Models\Financials\Wallet', 'wallet_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Financials\Category', 'category_id');
    }
}
