<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable  = [
        'user_id',
        'victim_id',
        'construction_status',
    ];

    /**
     * Get the victim that owns the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function victim()
    {
        return $this->belongsTo(Victim::class, 'victim_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'first_name', 'last_name');
    }
    /**
     * Get all of the donationInvoices for the Donation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function donationInvoices()
    {
        return $this->hasMany(DonationInvoice::class);
    }
}
