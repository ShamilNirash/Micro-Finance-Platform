<?php

namespace App\Http\Controllers;

use App\Repositories\BranchRepository;
use App\Repositories\MemberRepository;
use Illuminate\Validation\ValidationException;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    protected $memberRepository;
    protected $branchRepository;

    public function __construct(MemberRepository $memberRepository, BranchRepository $branchRepository)
    {
        $this->memberRepository = $memberRepository;
        $this->branchRepository = $branchRepository;
    }

    public function viewAllMembers()
    {
        $getActiveMembers = $this->memberRepository->get_all();
        $getAllBranches = $this->branchRepository->get_all();

        return view('branches.members', [
            'allActiveMembers' => $getActiveMembers,
            'allBranches' => $getAllBranches
        ]);
    }
    public function unAssignMemberSearch(Request $request)
    {
        $query = $request->input('q');
        $members = $this->memberRepository->un_assign_member_search($query);
        return response()->json($members);
    }

    public function createMember(Request $request)
    {
        try {
            $request->validate([
                'branch_id' => 'required|string|regex:/^[0-9]+$/',
                'center_id' => 'required|string|regex:/^[0-9]+$/',
                'group_id' => 'required|string|regex:/^[0-9]+$/',
                'memberFullName' => 'required|string',
                'memberPhoneNumber01' => 'required|string|regex:/^[0-9]+$/',
                'memberPhoneNumber02' => 'required|string|regex:/^[0-9]+$/',
                'memberAddress' => 'required|string',
                'memberNicNumber' => 'required|string|unique:members,nic_number',
                'memberGender' => 'required|in:Female,Male',
                'memberImage01' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
            $memberFullName = strtolower($request->input('memberFullName'));
            $memberAddress = strtolower($request->input('memberAddress'));
            $memberGender = $request->input('memberGender') == 'Female' ? 'FEMALE' : 'MALE';
            $image1Path = $request->file('memberImage01')->store('members/images', 'public');
            /*             $image2Path = $request->file('memberImage02')->store('members/images', 'public');
 */
            $this->memberRepository->create([
                'full_name' => $memberFullName,
                'mobile_number_1' => $request->memberPhoneNumber01,
                'mobile_number_2' => $request->memberPhoneNumber02,
                'image_1' => $image1Path,
                'gender' => $memberGender,
                'address' => $memberAddress,
                'nic_number' => $request->memberNicNumber,
                'group_id' => $request->group_id,
                'status' => 'ACTIVE'

            ]);
            return redirect()->back()->with('success', 'Member created successfully.');
        } catch (ValidationException $e) {
            Log::error('Error creating member validate: ' . $e->getMessage());
            return redirect()->back()
                ->with('show_create_popup', true)
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            Log::error('Error creating member: ' . $e->getMessage());
            return redirect()->back()
                ->with('show_create_popup', true)
                ->withInput()
                ->withErrors(['error' => 'Unexpected error occurred']);
        }
    }
}
