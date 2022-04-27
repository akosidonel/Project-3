<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralFundInventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_number',
        'quantity',
        'article',
        'description',
        'unit_value',
        'total_value',
        'location',
        'department',
        'end_user',
        'supplier',
        'account_code',
        'obr_number',
        'purchase_order_number',
        'page_number',
        'date',
        'remarks',
    ];
}
