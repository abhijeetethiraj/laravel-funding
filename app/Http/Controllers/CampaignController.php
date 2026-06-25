<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\CampaignImage;

class CampaignController extends Controller
{

    public function home()
    {
        $campaigns = Campaign::with('images')->latest()->get();
        return view('home', compact('campaigns'));
    }


    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
          
        $campaign = Campaign::create([
            'title' => $request->title,
            'story' => $request->story,
            'target_amount' => $request->target_amount,
            'campaigner_name' => $request->campaigner_name,
            'campaigner_city' => $request->campaigner_city,
            'beneficiary_name' => $request->beneficiary_name,
            'beneficiary_relation' => $request->beneficiary_relation,
            'hospital_name' => $request->hospital_name,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $imageData = file_get_contents($image);

                CampaignImage::create([
                    'campaign_id' => $campaign->id,
                    'image_data' => base64_encode($imageData)
                ]);
            }
        }
    }

    public function showDonate($id)
    {
        $campaign =  Campaign::findOrFail($id);
        return view(
            'donate',
            compact('campaign')
        );
    }

    public function show($id)
    {
        $campaign = Campaign::with('images')->findOrFail($id);

        return view(
            'campaign.show',
            compact('campaign')
        );
    }

    public function thank()
    {
        return view('campaign.thank');
    }
    public function failed(Request $request)
    {
        $campaign = Campaign::findOrFail(
            $request->campaign_id
        );

        return view(
            'campaign.failed',
            compact('campaign')
        );
    }
}
