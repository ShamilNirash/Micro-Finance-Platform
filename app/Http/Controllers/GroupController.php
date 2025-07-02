<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    protected $groupRepository;
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function getGroupsByCenter($centerId)
    {
        $groups = $this->groupRepository->search_many('center_id', $centerId);
        return response()->json($groups);
    }

    public function viewGroupSummary($groupId)
    {
        try {
            $groupDetails = $this->groupRepository->search_one('id', $groupId);
            return View('branches.groupSummary', ['group_details' => $groupDetails]);
        } catch (\Exception $e) {
            Log::error('Error getting center summary: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
