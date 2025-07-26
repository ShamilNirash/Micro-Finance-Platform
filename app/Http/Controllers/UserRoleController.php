<?php

namespace App\Http\Controllers;

use App\Repositories\UserRoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRoleController extends Controller
{
    protected $userRoleRepository;


    public function __construct(UserRoleRepository $userRoleRepository)
    {
        $this->userRoleRepository = $userRoleRepository;
    }
    public function userRolesView()
    {
        try {
            return view('settings/userRole');
        } catch (\Exception $e) {
            Log::error('Error getting active centers: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
