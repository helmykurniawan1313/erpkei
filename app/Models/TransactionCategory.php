<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "transaction_category";

    public function cashflow()
    {
        return $this->hasMany(Cashflow::class);
    }
    public function cashflowtransaction()
    {
        return $this->hasMany(CashflowCategory::class);
    }
}
