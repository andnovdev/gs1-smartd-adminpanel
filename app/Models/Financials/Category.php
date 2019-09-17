<?php

namespace App\Models\Financials;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'financial_categories';

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public $timestamps = false;

    public function sub_categories()
    {
        return $this->hasMany('App\Models\Financials\Category', 'parent_id');
    }

    public function parents()
    {
        return $this->belongsTo('App\Models\Financials\Category', 'parent_id');
    }

    public function budgets()
    {
        return $this->hasMany('App\Models\Financials\Budget', 'category_id');
    }

    public function incomes()
    {
        return $this->hasMany('App\Models\Financials\Income', 'category_id');
    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Financials\Expense', 'category_id');
    }
}
