<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface CampaignRepositoryInterface 
{
  public function getAll();

  public function getById($id);

  public function getWithImages($id);

  public function create(Request $request);

}



