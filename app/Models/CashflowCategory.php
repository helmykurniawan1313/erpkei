<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashflowCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "cashflow_category";

    public function cashflows()
    {
        return $this->hasMany(Cashflow::class);
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
