<?php

namespace App\Models\Financials;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'financial_incomes';

    protected $fillable = [
        'wallet_id',
        'value',
        'category_id',
        'purpose',
        'source',
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
