<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationInvoice extends Model
{
    use HasFactory;
    protected $fillable = [

        'donation_id',
        'user_id',
        'victim_id',
        'amount',
        'charges',
        'total_amount',
        'charged_amount',
        'transaction_type',
        'transaction_reference',
        'check_no',
        'card',
        'expiry',
        'cvv',
        'cardholder_first_name',
        'cardholder_last_name',
        'bank',
        'iban',
        'account_title',
        'bank_routing_number',
        'transaction_status',
        'payment_status',


    ];
}
