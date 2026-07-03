<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Campaign;
use App\Models\Donation;

class AdminRepository
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCampaigns = Campaign::count();
        $totalDonations = Donation::count();
        $totalAmount = DOnation::sum('amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCampaigns',
            'totalDonations',
            'totalAmount'

        ));
    }

    public function donations()
    {
        $search = request('search');
        $donation = Donation::query();

        if ($search) {
            $donation->where(function ($query) use ($search) {
                $query->where(
                    'donor_name',
                    'like',
                    "%{$search}%"
                )
                    ->orWhere(
                        'donor_email',
                        'like',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'payment_id',
                        'like',
                        "%{$search}%"
                    );
            });
        }
        $donations  = $donation
            ->latest()
            ->paginate(10);

        return view(
            'admin.donations.index',
            compact('donations')
        );
    }

    public function showDonation($id)
    {
        $donation = Donation::findOrFail($id);

        return view(
            'admin.donations.show',
            compact('donation')
        );
    }



    public function campaigns()
    {
        $search = request('search');

        $campaigns = Campaign::query();

        if ($search) {

            $campaigns->where(
                'title',
                'like',
                "%{$search}%"
            );
        }

        $campaigns = $campaigns
            ->latest()
            ->paginate(10);

        return view(
            'admin.campaigns.index',
            compact('campaigns')
        );
    }

    public function showCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);

        return view(
            'admin.campaigns.show',
            compact('campaign')
        );
    }



    public function users()
    {
        $search = request('search');

        $users = User::query();

        if ($search) {

            $users->where(function ($query) use ($search) {

                $query->where(
                    'name',
                    'like',
                    "%{$search}%"
                )

                    ->orWhere(
                        'email',
                        'like',
                        "%{$search}%"
                    );
            });
        }

        $users = $users
            ->latest()
            ->paginate(10);

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);

        return view(
            'admin.users.show',
            compact('user')
        );
    }
}
