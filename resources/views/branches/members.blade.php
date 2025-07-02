@extends('layouts.layout')

@php
    require_once resource_path('libs\first_letter_capitalization.php');
    require_once resource_path('libs\every_word_first_letter_capitalization.php');
@endphp
@section('contents')
    <div id="mainContent" class="flex lg:h-full">
        <!-- First Column -->
        <!--Mobile Cards and table View-->
        <div id="firstColumn" class="w-full h-full p-2 lg:border-r lg:p-4 transition-all duration-300  lg:relative ">

            <!-- Add New Member Modal -->
            <div id="addNewMemberModal"
                class="inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 lg:absolute fixed p-4"
                style="width: 100%; height: 100%;">
                <div class="bg-white shadow-xl w-full max-w-lg rounded-lg max-h-[90vh] overflow-y-auto">
                    <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add New Member</h2>
                    <form id="addNewMemberForm" method="POST" action="{{ route('members.create') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-500 border border-red-700 text-white px-4 py-2 rounded mb-4">
                                <strong>There were some errors:</strong>
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="bg-white rounded-b-lg p-4 space-y-4">
                            <div class="flex items-center space-x-4">
                                <label for="newMemberCenter" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Branch Name*
                                </label>
                                <select id="centerBranch" name="branch_id"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                                    <option value="" disabled selected>Select a branch</option>
                                    @foreach ($allBranches as $branch)
                                        <option value="{{ $branch->id }}">
                                            {{ capitalizeFirstLetter($branch->branch_name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center space-x-4">
                                <label for="newMemberCenter" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Center
                                    Name*</label>
                                <select id="newMemberCenter" name="center_id"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                                    <option value="" disabled selected>Select a center</option>
                                </select>
                            </div>

                            <div class="flex items-center space-x-4">
                                <label for="newMemberGroup" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Group
                                    Name*</label>
                                <select id="newMemberGroup" name="group_id"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required>
                                    <option value="" disabled selected>Select a group</option>
                                </select>
                            </div>


                        </div>
                        <div>
                            <p class="text-xs text-gray-500 px-4 text-center">member details:</p>
                            <hr>
                        </div>
                        <div class="bg-white rounded-b-lg p-4 space-y-4">

                            <div class="flex items-center space-x-4">
                                <label for="newMemberFullName" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Full
                                    Name*</label>
                                <input type="text" name="memberFullName" id="newMemberFullName" placeholder=""
                                    value="{{ old('memberFullName') }}"
                                    class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                    required />
                            </div>
                            <div
                                class="flex flex-col lg:flex-row lg:justify-between w-full lg:space-x-4 space-y-2 lg:space-y-0">
                                <div class="lg:w-1/2 flex items-center space-x-4">
                                    <label for="newMemberMobile01" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Mobile
                                        Number 01</label>
                                    <input type="tel" name="memberPhoneNumber01" id="newMemberMobile01" placeholder=""
                                        class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                </div>
                                <div class="lg:w-1/2 flex items-center space-x-4">
                                    <label for="newMemberMobile02" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Mobile
                                        Number 02</label>
                                    <input type="tel" name="memberPhoneNumber02" id="newMemberMobile02" placeholder=""
                                        class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <label for="newMemberAddress"
                                    class="block text-xs text-gray-400 mb-1 ml-2 w-36">Address?</label>
                                <input type="text" name="memberAddress" id="newMemberAddress" placeholder=""
                                    class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                            </div>
                            <div class="flex justify-between">
                                <div class="w-1/2 flex items-center space-x-4">
                                    <label for="newMemberNIC" class="block text-xs text-gray-400 mb-1 ml-2 w-36">NIC</label>
                                    <input type="text" id="newMemberNIC" name="memberNicNumber" placeholder=""
                                        class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                </div>
                                <div class="w-1/2 flex items-center space-x-4  pl-4">
                                    <label class="text-xs text-gray-400 w-1/2 flex space-x-1">
                                        <input type="radio" name="memberGender" value="Male" class="p-1 " />
                                        <p>Male</p>
                                    </label>
                                    <label class="text-xs text-gray-400 w-1/2 flex space-x-1">
                                        <input type="radio" name="memberGender" value="Female" class="p-1 " />
                                        <p>Female</p>
                                    </label>

                                </div>
                            </div>
                            <div class="flex justify-between items-center space-x-4">
                                <div>
                                    <label class="block text-xs text-gray-400 mb-1 ml-2">Image (NIC)*</label>
                                    <input type="file" id="newMemberImage1" name="memberImage01"
                                        class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                        required />
                                </div>
                                <div>
                                    <label class="block text-xs text-gray-400 mb-1 ml-2">Image*</label>
                                    <input type="file" id="newMemberImage2" name="memberImage02"
                                        class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                                        required />
                                </div>
                            </div>
                            <div class="flex justify-end space-x-4 mt-2">
                                <button type="button" id="cancelNewMember"
                                    class="px-6 py-1 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                                    Cancel
                                </button>
                                <button type="submit" id="createNewMember"
                                    class="px-6 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sm">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session('show_create_popup'))
                    <script>
                        window.showCreatePopup = true;
                    </script>
                @endif
            </div>

            <div class="p-0 border-0 lg:py-2 lg:bg-sky-50 lg:border rounded-lg flex flex-col justify-between h-full">
                <!-- Top Bar -->
                <div
                    class="flex flex-col w-full space-y-2 p-2 lg:px-2 text-md lg:flex lg:flex-row lg:space-y-0 lg:justify-between lg:items-center lg:p-1">
                    <!-- Filter Button -->
                    <div class="hidden lg:flex text-sm">
                        <button value="" class="bg-white p-2 rounded-lg focus:outline-none border w-8">
                            <img src="{{ asset('assets/icons/Funnel.svg') }}" alt="Dashboard Icon" class="h-4 w-4">
                        </button>
                    </div>
                    <!-- Hidden native select for form submission -->
                    <div
                        class="flex flex-col lg:flex-row justify-between items-center w-full lg:justify-normal lg:items-baseline lg:w-3/12">
                        <div class="w-full lg:mb-0 relative text-sm">
                            <select id="branchSelect" name="branch"
                                class="w-full absolute p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none hidden text-sm lg:text-xs">
                                <option class="text-sm" value="">Select Branch</option>
                                @foreach ($allBranches as $branch)
                                    <option value="add_new">{{ capitalizeFirstLetter($branch->branch_name) }}</option>
                                @endforeach
                            </select>
                            <!-- Custom dropdown trigger -->
                            <div id="dropdownTrigger"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white cursor-pointer flex items-center justify-between lg:text-xs"
                                onclick="toggleDropdown()">
                                <span id="selectedOption">Select Branch</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>

                            <!-- Custom dropdown menu -->
                            <div id="dropdownMenu"
                                class="hidden absolute z-10 w-full bg-white border rounded-lg mt-1 shadow-lg lg:text-xs">
                                <ul class="py-1 px-8 lg:px-4 lg:text-xs">
                                    {{--  <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                        data-value="add_new" id="addBranchButton">+ Add New Branch</li> --}}
                                    @foreach ($allBranches as $branch)
                                        <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                            data-value="balangoda">{{ capitalizeFirstLetter($branch->branch_name) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Search Bar -->
                    <div class="w-full text-sm lg:text-xs lg:w-5/12">
                        <input type="text" id="searchMember" placeholder="Search Member..."
                            class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" />
                    </div>
                    <!-- Add Member Button -->
                    <div class="w-full text-sm lg:text-xs lg:w-3/12">
                        <button id="addNewMemberButton" value="add_new_member"
                            class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                            + Add Member
                        </button>
                    </div>
                </div>

                <p class="text-center text-xs my-2 text-gray-400 lg:hidden">Total member {{ $allActiveMembers->count() }}
                </p>

                <!-- member Grid card format hidden for lg screens -->
                <div id="memberGrid" class="grid grid-cols-1 sm:grid-cols-1 lg:hidden gap-2 p-2">
                    @foreach ($allActiveMembers as $member)
                        <div class="rounded-lg shadow flex flex-row justify-between w-full bg-blue-100 hover:bg-blue-200"
                            data-member="Dunura Hansaja">
                            <div class=" py-2 px-4 flex flex-col justify-center space-y-">
                                <div class="text-sm">{{ $member->full_name }}<span>-
                                        {{ $member->group->center->center_name }}</span></div>
                                <div class="text-xs flex items-center space-x-1 text-gray-700">
                                    <p>{{ $member->nic_number }}</p>
                                </div>
                            </div>
                            <div class="py-2 px-4 flex flex-col justify-center space-y-1">
                                <div class="text-sm font-bold">20 000/=</div>
                            </div>
                        </div>
                    @endforeach
                </div>

            <!-- member Grid Table format hidden for mobile screens -->
            <div class="flex justify-start h-full pt-2">
                <div id="memberGridTable" class="w-full max-h-[calc(100vh-200px)]  hidden lg:block p-0 overflow-y-auto">
                    <div class="min-w-full ">
                        <table class="w-full min-w-max">
                            <thead class="w-full text-gray-700 text-xs font-light bg-gray-100 sticky top-0">
                                <tr class="uppercase w-full">
                                    <th class="pl-2 text-left">
                                        <input type="checkbox" id="select-all" class="form-checkbox h-4 w-4 text-blue-400 m-1">
                                    </th>
                                    <th class="py-2 text-left">#</th>
                                    <th class="py-2 text-left">Name</th>
                                    <th class="py-2 text-left">Center</th>
                                    <th class="py-2 text-left">NIC</th>
                                    <th class="py-2 text-left">Loan Balance</th>
                                    <th class="py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800 text-xs font-light bg-white w-full">
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>
                                <!-- Additional rows with placeholder data -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Dunura Hansja" data-center-name="Maharagama" data-NIC="20001589432" data-loan-balance="20000">
                                    <td class="pl-2 text-left">
                                        <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                    </td>
                                    <td class="py-2 text-left">001</td>
                                    <td class="py-2 text-left">Dunura hansaja</td>
                                    <td class="py-2 text-left">waththegedra</td>
                                    <td class="py-2 text-left">20015896423</td>
                                    <td class="py-2 text-left">2000</td>
                                    <td class="py-2 text-center flex justify-center items-center gap-1">
                                        <a href="#" class="border rounded hover:bg-green-500">
                                            <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-sky-500">
                                            <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                        <a href="#" class="border rounded hover:bg-lime-500">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                        </a>
                                    </td>
                                </tr>


                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                <div class="hidden mt-2 mx-4 lg:flex justify-between items-center text-xs text-gray-500">
                    <span id="paginationRange">1-10 of 87</span>
                    <div class="flex justify-center items-center">
                        <div class="pr-8">
                            <select id="rowsPerPage" class="rounded bg-sky-50 text-xs">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                            <span>Rows per page</span>
                        </div>
                        <button id="prevPage"
                            class="px-1 py-1 bg-gray-200 rounded hover:bg-sky-200 disabled:opacity-50 disabled:cursor-not-allowed">
                            <img src="{{ asset('assets/icons/CaretLeft.svg') }}" alt="Previous" class="h-3 w-3">
                        </button>
                        <span id="pageIndicator" class="px-2 text-xs">1/15</span>
                        <button id="nextPage"
                            class="px-1 py-1 bg-gray-200 rounded hover:bg-sky-200 disabled:opacity-50 disabled:cursor-not-allowed">
                            <img src="{{ asset('assets/icons/CaretRight.svg') }}" alt="Next" class="h-3 w-3">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Column: Row Details -->
        <div id="RowDetails" class="hidden h-full lg:w-4/12 flex-col justify-between transition-all duration-300">
            <div id="RowDetailsContent" class="border-b p-4">
                <h1 id="memberNameShow" class="text-md font-medium text-gray-800 mb-1"></h1>
                <h1 id="memberName" class="text-xs text-gray-600 mb-4"><span id="branchNameShow"></span> > <span
                        id="centerNameShow"></span> >
                    <span id="groupNameShow"></span>
                </h1>
                <div class="grid grid-cols-2 gap-y-2">
                    <div>
                        <p for="num01" class="text-xs text-gray-400">Mobile number 01</p>
                        <p id="phonenum01" class="text-sm"></p>
                    </div>
                    <div>
                        <p for="num02" class="text-xs text-gray-400">Mobile number 02</p>
                        <p id="phonenum02" class="text-sm"></p>
                    </div>
                    <div>
                        <p for="NIC" class="text-xs text-gray-400">NIC</p>
                        <p id="nicNumberShow" class="text-sm"></p>
                    </div>
                    <div>
                        <p for="Attach" class="text-xs text-gray-400">Attach</p>
                        <p id="Attach" class="text-sm flex">
                            <a href="#" class="border rounded hover:bg-green-500">
                                <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                            </a>
                            <span class="ml-2">Img.pn</span>
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-y-2 mt-2">
                    <div>
                        <p for="memberAddress" class="text-xs text-gray-400">Address</p>
                        <p id="memberAddressShow" class="text-sm mt-0"></p>
                    </div>
                </div>
            </div>
            <div class=" space-y-4 h-full ">
                <div class="p-4 border-b w-full">
                    <h1 id="" class="text-sm font-medium text-gray-800 mb-1">Current Loan Details</h1>
                    <div class="grid grid-cols-3 gap-y-2">
                        <div>
                            <p for="LoanAmount" class="text-xs text-gray-400">Loan Amount</p>
                            <p id="LoanAmount" class="text-sm">10 000 00</p>
                        </div>
                        <div>
                            <p for="Interest" class="text-xs text-gray-400">Interest</p>
                            <p id="Interest" class="text-sm">15%</p>
                        </div>
                        <div>
                            <p for="IssueDate" class="text-xs text-gray-400">Issue Date</p>
                            <p id="IssueDate" class="text-sm">2025/06/12</p>
                        </div>
                        <div>
                            <p for="Installment" class="text-xs text-gray-400">Installment</p>
                            <p id="Installment" class="text-sm">10</p>
                        </div>
                        <div>
                            <p for="Terms" class="text-xs text-gray-400">Terms</p>
                            <p id="Terms" class="text-sm">Terms</p>
                        </div>
                        <div>
                            <p for="DocumentChagers" class="text-xs text-gray-400">Document Chagers</p>
                            <p id="DocumentChagers" class="text-sm">-</p>
                        </div>

                    </div>
                    <div class="w-full text-sm lg:text-xs  pt-4">
                        <button id="addLoanButton" value="add_new_loan"
                            class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                            + Add Loan
                        </button>
                    </div>
                </div>
            </div>
            <div class=" p-4 border-t">
                <div class="w-full text-sm lg:text-xs  pt-4">
                    <button id="ViewFullDetail" value=""
                        class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                        View Full Detail
                    </button>
                </div>

            </div>

        </div>



    </div>

<script>
    // Add alternating background colors to table rows
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#centersGridTable tbody tr');
        rows.forEach((row, index) => {
            // Add alternating background colors
            row.classList.add(index % 2 === 0 ? 'bg-white' : 'bg-gray-100');

                // Ensure hover color overrides the background
                row.classList.add('hover:bg-sky-100');
            });
        });

        document.getElementById('centerBranch').addEventListener('change', function() {
            const branchId = this.value;
            const centerSelect = document.getElementById('newMemberCenter');

            // Clear existing options
            centerSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

            fetch(`/centers/${branchId}`)
                .then(response => response.json())
                .then(data => {
                    centerSelect.innerHTML = '<option value="" disabled selected>Select a center</option>';
                    data.forEach(center => {
                        const option = document.createElement('option');
                        option.value = center.id;
                        option.textContent = center.center_name.charAt(0).toUpperCase() + center
                            .center_name.slice(1).toLowerCase();
                        centerSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    centerSelect.innerHTML =
                        '<option value="" disabled selected>Error loading centers</option>';
                    console.error('Error:', error);
                });
        });
        const centerDropdown = document.getElementById('newMemberCenter');
        const groupDropdown = document.getElementById('newMemberGroup');

        centerDropdown.addEventListener('change', function() {
            const centerId = this.value;
            groupDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';

            fetch(`/groups/${centerId}`)
                .then(response => response.json())
                .then(data => {
                    groupDropdown.innerHTML = '<option value="" disabled selected>Select a group</option>';
                    data.forEach(group => {
                        const option = document.createElement('option');
                        console.log(group)
                        option.value = group.id;
                        option.textContent = group.group_name.charAt(0).toUpperCase() + group.group_name
                            .slice(1).toLowerCase();
                        groupDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching groups:', error);
                    groupDropdown.innerHTML =
                        '<option value="" disabled selected>Error loading groups</option>';
                });
        });
        // Search Filter for both mobile and web views
        document.getElementById('searchMember').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            // Mobile view (cards)
            const cards = document.querySelectorAll('#memberGrid > div');
            cards.forEach(card => {
                const centerName = card.getAttribute('data-member').toLowerCase();
                card.style.display = centerName.includes(searchTerm) ? 'flex' : 'none';
            });

            // Web view (table rows)
            const tableRows = document.querySelectorAll('#memberGridTable tbody tr');
            tableRows.forEach(row => {
                const centerName = row.getAttribute('data-member-name').toLowerCase();
                row.style.display = centerName.includes(searchTerm) ? 'table-row' : 'none';
            });
        });


        //Coustom dropdown
        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        document.querySelectorAll('#dropdownMenu li').forEach(item => {
            item.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                const selectedOption = document.getElementById('selectedOption');
                selectedOption.textContent = this.textContent;
                document.getElementById('branchSelect').value = value;
                document.getElementById('dropdownMenu').classList.add('hidden');

                // Trigger modal for "Add New Branch"
                if (value === 'add_new') {
                    document.getElementById('addBranchModal').classList.remove('hidden');
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const trigger = document.getElementById('dropdownTrigger');
            if (!trigger.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });

        // Toggle dropdown menu
        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }

        // Handle dropdown selection
        document.querySelectorAll('#dropdownMenu li').forEach(item => {
            item.addEventListener('click', () => {
                const value = item.getAttribute('data-value');
                const text = item.textContent;
                document.getElementById('selectedOption').textContent = text;
                document.getElementById('branchSelect').value = value;
                document.getElementById('dropdownMenu').classList.add('hidden');

                if (value === 'add_new') {
                    document.getElementById('addBranchModal').classList.remove('hidden');
                }
            });
        });

        //check box selection
        document.getElementById('select-all').addEventListener('change', function(e) {
            let checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
        });

        // Checkbox handling
        document.querySelectorAll('input[name="selected_ids[]"]').forEach(checkbox => {
            checkbox.addEventListener('click', function(e) {
                e.stopPropagation();

                if (this.id !== 'select-all') {
                    // Update "select all" status
                    const allCheckboxes = document.querySelectorAll(
                        'input[name="selected_ids[]"]:not(#select-all)');
                    const allChecked = [...allCheckboxes].every(cb => cb.checked);
                    document.getElementById('select-all').checked = allChecked;
                }
            });
        });


        // Helper function to hide all second columns
        function hideAllSecondColumns() {
            const columns = ['RowDetails', 'centersColumn', 'branchesColumn'];
            columns.forEach(col => document.getElementById(col).classList.add('hidden'));

            document.getElementById('firstColumn').classList.remove('lg:w-8/12');
            document.getElementById('firstColumn').classList.add('lg:w-full');

        }

        // Row Summey
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior
                console.log("test");
                const row = button.closest('tr');
                const RowDetails = document.getElementById('RowDetails');
                const firstColumn = document.getElementById('firstColumn');

                // Show second column
                RowDetails.classList.remove('hidden');
                firstColumn.classList.remove('lg:w-full');
                firstColumn.classList.add('lg:w-8/12');
                RowDetails.classList.add('lg:flex');

                // Update second column content
                const memberData = JSON.parse(row.getAttribute('data-member'));
                const member_fullname = row.getAttribute('data-member-fullname');
                const branch_name = row.getAttribute('data-branchname');
                const center_name = row.getAttribute('data-center-name');
                const member_id = row.getAttribute('data-member-id');
                console.log(memberData);
                document.getElementById('memberNameShow').textContent = member_fullname;
                document.getElementById('branchNameShow').textContent = branch_name;
                document.getElementById('centerNameShow').textContent = center_name;
                document.getElementById('groupNameShow').textContent = memberData.group.group_name;
                document.getElementById('phonenum01').textContent = memberData.mobile_number_1;
                document.getElementById('phonenum02').textContent = memberData.mobile_number_2;
                document.getElementById('nicNumberShow').textContent = memberData.nic_number;
                document.getElementById('memberAddressShow').textContent = memberData.address;






                /* memberData.group.center.branch.branch_name */
                ;

                /*   document.getElementById('branchName').textContent = 'test';
                  document.getElementById('Cname').textContent = centerName;
                  document.getElementById('Cmanager').textContent = manager;
                  document.getElementById('Tgroup').textContent = groups;
                  document.getElementById('Tmember').textContent = member; */
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize selectedmember array
            window.selectedmember = window.selectedmember || [];

            const modal = document.getElementById('addNewMemberModal');

            // Show modal if server set a flag (via Blade)
            if (modal && window.showCreatePopup === true) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                console.log('Modal reopened after validation error');
            }

            // Open modal on Add button click
            const addNewMemberButton = document.getElementById('addNewMemberButton');
            if (addNewMemberButton) {
                addNewMemberButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            }

            // Close modal on Cancel button click
            const cancelNewMemberButton = document.getElementById('cancelNewMember');
            if (cancelNewMemberButton) {
                cancelNewMemberButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.getElementById('addNewMemberForm').reset();
                });
            }
        });


        // Handle Cancel buttons
        document.getElementById('cancelBranch').addEventListener('click', () => {
            document.getElementById('addBranchModal').classList.add('hidden');
            hideAllSecondColumns();
        });

        document.getElementById('cancelCenter').addEventListener('click', () => {
            document.getElementById('addCenterModal').classList.add('hidden');
            hideAllSecondColumns();
        });

        // Hide column buttons
        document.getElementById('hideCentersColumn').addEventListener('click', () => {
            hideAllSecondColumns();
        });

        document.getElementById('hideBranchesColumn').addEventListener('click', () => {
            hideAllSecondColumns();
        });
    </script>

    <style>
        /* Override any flex properties for hidden columns */
        #RowDetails.hidden,
        #centersColumn.hidden,
        #branchesColumn.hidden {
            display: none !important;
            visibility: hidden !important;
            width: 0 !important;
            min-width: 0 !important;
            flex: 0 !important;
        }

        /* Ensure first column takes full width when second columns are hidden */
    </style>
@endsection
