<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface DonationRepositoryInterface
{
    public function store(Request $request);
}