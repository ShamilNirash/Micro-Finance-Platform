<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

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
}
