<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RefundRepository;

class RefundController extends Controller
{
    protected $refundRepository;

    public function __construct(RefundRepository $refundRepository)
    {
        $this->refundRepository = $refundRepository;
    }

    public function create($id)
    {
        return $this->refundRepository->create($id);
    }

    public function store(Request $request)
    {
        return $this->refundRepository->store($request);
    }
}