<h2>Hello {{ $highestDonor->donor_name }},</h2>

<p>Thank you for supporting our campaigns.</p>

<p>
You are currently our highest donor with a contribution of
<strong>₹{{ number_format($highestDonor->total_amount, 2) }}</strong>.
</p>

<p>We sincerely appreciate your generosity.</p>

<p>
Regards,<br>
ImpactGuru Team
</p>