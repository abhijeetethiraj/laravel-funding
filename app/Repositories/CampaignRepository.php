<?php

namespace App\Repositories;


use App\Interfaces\CampaignRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignImage;


class CampaignRepository implements CampaignRepositoryInterface
{

    public function getAll()
    {
        return Campaign::with('images')
            ->latest()->get();
    }

    public function getById($id) {

      return Campaign::findOrFail($id);
    }

    public function getWithImages($id) {
         return Campaign::with('images')
            ->findOrFail($id);
    }

    public function create(Request $request) {
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
        return $campaign;
    }
}
