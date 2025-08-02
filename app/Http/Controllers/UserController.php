<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Repositories\UserRoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected $userRepository;
    protected $userRoleRepository;



    public function __construct(UserRepository $userRepository, UserRoleRepository $userRoleRepository)
    {
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
    }

    public function createUser(Request $request)
    {
        try {
            $request->merge([
                'first_name' => strtolower($request->input('first_name')),
                'last_name' => strtolower($request->input('last_name')),
            ]);

            $request->validate([
                'email' => [
                    'required',
                    'string',
                    Rule::unique('users')
                ],
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'password' => 'required|string|min:8',
                'nic_number' => 'required|string',
                'phoneNumber01' => 'required|string|regex:/^[0-9]+$/',
                'role_id' => 'required|numeric',
                'userImage01' => 'file|image|mimes:jpeg,png,jpg',
            ]);
            if ($request->file('userImage01')) {
                $image1Path = $request->file('userImage01')->store('users/ppImages', 'public');
                $this->userRepository->create([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'nic_number' => $request['nic_number'],
                    'mobile_number_1' => $request['phoneNumber01'],
                    'user_role_id' => $request['role_id'],
                    'payment_date' => $request['payment_day'],
                    'image' => $image1Path,
                    'status' => 'ACTIVE',
                ]);
            } else {
                $this->userRepository->create([
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'nic_number' => $request['nic_number'],
                    'mobile_number_1' => $request['phoneNumber01'],
                    'user_role_id' => $request['role_id'],
                    'payment_date' => $request['payment_day'],
                    'status' => 'ACTIVE',
                ]);
            }


            return redirect()->back()->with('success', 'User created successfully.');
        } catch (ValidationException $e) {
            dd($e);
            return redirect()->back()
                ->with('show_create_center_popup', true)
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            dd($e);

            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function usersView()
    {
        try {

            $all_active_users = $this->userRepository->get_all();
            $all_active_user_roles = $this->userRoleRepository->get_all();
            return view('settings/userAccount', ['all_active_users' => $all_active_users, 'all_active_user_roles' => $all_active_user_roles]);
        } catch (\Exception $e) {
            Log::error('Error getting active user roles: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function updateUser(Request $request)
    {
        try {
            $request->merge([
                'first_name' => strtolower($request->input('first_name')),
                'last_name' => strtolower($request->input('last_name')),
            ]);
            $request->validate([
                'email' => [
                    'required',
                    'string',
                    Rule::unique('users')
                        ->ignore($request->id) // Ignore the current user's ID
                        ->where(function ($query) {
                            return $query->where('status', 'ACTIVE');
                        }),
                ],
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'nic' => 'required|string',
                'mobile' => 'required|string|regex:/^[0-9]+$/',
                'role_id' => 'required|numeric',
                'userImage01' => 'file|image|mimes:jpeg,png,jpg',

            ]);


            $user = $this->userRepository->search_one('id', $request->id);
            if ($request->file('userImage01')) {
                $image1Path = $request->file('userImage01')->store('users/ppImages', 'public');
                $user->image = $image1Path;
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->nic_number = $request->nic;
            $user->mobile_number_1 = $request->mobile;
            $user->user_role_id = $request->role_id;
            $user->save();
            return response()->json(['status' => 'success', 'message' => 'User updated successfully']);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->with('show_create_center_popup', true)
                ->withInput()
                ->withErrors($e->errors());
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function deleteUser($userId)
    {
        try {
            $this->userRepository->update($userId, 'status', 'INACTIVE');
            return response()->json(['message' => 'User Delete successfully.']);
        } catch (\Exception $e) {
            Log::error('Error delete user: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
