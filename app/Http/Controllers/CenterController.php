<?php

namespace App\Http\Controllers;

use App\Repositories\BranchRepository;
use App\Repositories\CenterRepository;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    protected $centerRepository;
    protected $branchRepository;
    public function __construct(CenterRepository $centerRepository, BranchRepository $branchRepository)
    {
        $this->centerRepository = $centerRepository;
        $this->branchRepository = $branchRepository;
    }

    public function getAllActiveCenters()
    {
        $all_active_centers = $this->centerRepository->get_all();
        return View('branches.centers', ['all_active_centers' => $all_active_centers]);
    }
}
