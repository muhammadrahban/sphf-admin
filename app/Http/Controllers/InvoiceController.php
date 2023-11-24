<?php

namespace App\Http\Controllers;

use App\Models\DonationInvoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function update(Request $request, DonationInvoice $invoice)
    {
        $invoice->update($request->all());
        return response()->json(['invoice' => $invoice, 'newdata' => $request->all(), 'message' => 'invoice update successfully']);
    }
    //   // Add this method to your controller
    //   public function checkEmailUnique(Request $request)
    //   {
    //       $email = $request->input('email');

    //       // Check if the email is unique in your database
    //       $isUnique = !User::where('email', $email)->exists();

    //       return response()->json(['valid' => $isUnique]);
    //   }
}
