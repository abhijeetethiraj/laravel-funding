<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminRepository;

    public function  __construct(
        AdminRepository $adminRepository
    ) {
        $this->adminRepository = $adminRepository;
    }
    public function dashboard()
    {
        return $this->adminRepository->dashboard();
    }

    public function donations()
    {
        return $this->adminRepository->donations();
    }

    public function showDonation($id)
    {
        return $this->adminRepository->showDonation($id);
    }
    public function campaigns()
    {
        return $this->adminRepository->campaigns();
    }
    public function showCampaign($id)
    {
        return $this->adminRepository->showCampaign($id);
    }

    public function users()
    {
        return $this->adminRepository->users();
    }

    public function showUser($id)
    {
        return $this->adminRepository->showUser($id);
    }
}
