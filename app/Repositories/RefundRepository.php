<?php

namespace App\Repositories;

use App\Models\Refund;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundRepository
{
    public function create($id)
    {
        $donation = Donation::findOrFail($id);

        return view(
            'admin.refunds.create',
            compact('donation')
        );
    }

  public function store(Request $request)
{
    $request->validate([
        'donation_id' => 'required|exists:donations,id',
        'amount'      => 'required|numeric|min:1',
        'reason'      => 'required|string|max:255',
    ]);

    $donation = Donation::findOrFail($request->donation_id);

$totalRefunded = Refund::where(
    'donation_id',
    $donation->id
)->sum('amount');
$remainingAmount = $donation->amount - $totalRefunded;

$remainingAmount = $donation->amount - $totalRefunded;

if ($request->amount > $remainingAmount) {

    return back()->with(
        'error',
        'Refund amount exceeds remaining refundable amount.'
    );
}



Refund::create([
    'donation_id' => $donation->id,
    'refund_id' => 'REF-' . time(),
    'amount' => $request->amount,
    'reason' => $request->reason,
    'status' => 'processed',
    'processed_by' => Auth::id(),
    'notes' => 'Manual refund',
]);

return redirect()
    ->route('admin.donations.show', $donation->id)
    ->with('success', 'Refund recorded successfully.');

}
}