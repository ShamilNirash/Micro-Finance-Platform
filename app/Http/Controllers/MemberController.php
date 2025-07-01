<?php

namespace App\Http\Controllers;

use App\Repositories\BranchRepository;
use App\Repositories\MemberRepository;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

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


    public function createMember(Request $request)
    {
        dd($request);
    }
}
