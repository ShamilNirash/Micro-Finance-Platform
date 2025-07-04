<?php

namespace App\Http\Controllers;

use App\Repositories\BranchRepository;
use App\Repositories\CenterRepository;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CenterController extends Controller
{
    protected $centerRepository;
    protected $branchRepository;
    public function __construct(CenterRepository $centerRepository, BranchRepository $branchRepository)
    {
        $this->centerRepository = $centerRepository;
        $this->branchRepository = $branchRepository;
    }
    public function createCenter(Request $request)
    {
        try {
            $request->merge([
                'center_name' => strtolower($request->input('center_name')),
                'manager_name' => strtolower($request->input('manager_name'))
            ]);
            $request->validate([
                'center_name' => 'required|string|max:255|unique:centers,center_name',
                'branch_id' => 'required|string|regex:/^[0-9]+$/',
                'payment_day' => 'required|in:MONDAY,TUESDAY,WEDNESDAY,THURSDAY,FRIDAY,SATURDAY,SUNDAY',
                'manager_name' => 'required|string|max:255'
            ]);

            $this->centerRepository->create(['center_name' => $request['center_name'], 'manager_name' => $request['manager_name'], 'branch_id' => $request['branch_id'], 'payment_date' => $request['payment_day'], 'status' => 'ACTIVE']);

            return redirect()->back()->with('success', 'Branch created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->with('show_create_center_popup', true)
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            Log::error('Error creating branch: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function getAllActiveCenters()
    {
        try {
            $all_active_centers = $this->centerRepository->get_all();
            $all_active_branches =  $this->branchRepository->get_all();
            return View('branches.centers', ['all_active_centers' => $all_active_centers, 'all_active_branches' => $all_active_branches]);
        } catch (\Exception $e) {
            Log::error('Error creating branch: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    // In CenterController.php
    public function getCentersByBranch($branchId)
    {
        try {
            $centers = $this->centerRepository->search_many('branch_id', $branchId);
            return response()->json($centers);
        } catch (\Exception $e) {
            Log::error('Error getting branch: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function viewCenterSummary($centerId)
    {
        try {
            $centerDetails = $this->centerRepository->search_one('id', $centerId);
            return View('branches.centerSummary', ['center_details' => $centerDetails]);
        } catch (\Exception $e) {
            Log::error('Error getting center summary: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
