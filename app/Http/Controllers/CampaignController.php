<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\CampaignRepository;

class CampaignController extends Controller
{
    protected $campaignRepository;

     public function __construct
     (
        CampaignRepository $campaignRepository
     )
     {
       $this->campaignRepository = $campaignRepository;
     }
    
     
    public function home()
    {
        
        $campaigns = $this->campaignRepository->getAll();
     
        return view('home', compact('campaigns'));
    
    }


    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
          
       $this->campaignRepository->create($request);
      
    }

    public function showDonate($id)
    {
        $campaign =  $this->campaignRepository->getById($id);
        return view(
            'donate',
            compact('campaign')
        );
    }

    public function show($id)
    {
        $campaign = $this->campaignRepository->getWithImages($id);

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
        $campaign = $this->campaignRepository->getById($request->campaign_id);
        return view(
            'campaign.failed',
            compact('campaign')
        );
    }
}
