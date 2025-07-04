<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException as ValidationValidationException;

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

    public function createGroup(Request $request)
    {
        try {
            $request->merge([
                'group_name' => strtolower($request->input('group_name')),
            ]);
            $request->validate([
                'center_id' => 'required|string|regex:/^[0-9]+$/',
                'branch_id' => 'required|string|regex:/^[0-9]+$/',
                'group_name' => 'required|string|max:255'
            ]);
            $this->groupRepository->create(['group_name' => $request['group_name'], 'center_id' => $request['center_id'], 'branch_id' => $request['branch_id'],  'status' => 'ACTIVE']);

            return redirect()->back()->with('success', 'Group created successfully.');
        } catch (ValidationValidationException $e) {
            session()->flash('show_create_popup', true);
            Log::error('Validation Error creating group: ' . $e->getMessage());
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error creating group: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
