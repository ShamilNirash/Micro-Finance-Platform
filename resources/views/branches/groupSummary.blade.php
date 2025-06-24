@extends('layouts.layout')

@section('contents')
<div id="mainContent" class="flex lg:h-full">
    <!-- First Column -->
    <!--Mobile Cards and table View-->
    <div id="firstColumn" class="w-full h-full p-2 lg:border-r lg:p-4 transition-all duration-300  lg:relative space-y-2">

        <!-- Add New Member Modal -->
        <div id="addMemberModal" class="inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 lg:absolute fixed p-4" style="width: 100%; height: 100%;">
            <div class="bg-white shadow-xl w-full max-w-md rounded-lg ">
                <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add Member</h2>
                <form id="addmemberForm">
                    <div class="bg-white rounded-b-lg p-4 space-y-4">
                        <div class="flex justify-center space-x-4 mt-4">
                            <button type="button" id="addExistingMember" class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                                Add Existing Member
                            </button>
                            <button type="button" id="addNewMember" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none text-sm">
                                Add New Member
                            </button>
                        </div>
                        <div class="flex justify-center items-end pt-8">
                            <button type="button" id="cancelMember" class="px-6 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sx">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Existing Member Modal -->
        <div id="addExistingMemberModal" class="inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 lg:absolute fixed p-4" style="width: 100%; height: 100%;">
            <div class="bg-white shadow-xl w-full max-w-md rounded-lg">
                <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add Existing Members</h2>
                <div class="bg-white rounded-b-lg p-4 space-y-4">
                    <div>
                        <input type="text" id="searchExistingMembers" placeholder="Search members..." class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                    </div>
                    <div id="existingMembersList" class="max-h-40 overflow-y-auto space-y-2 text-sm">
                        <!-- Dynamic member list will be populated here -->
                    </div>
                    <div class="flex justify-end space-x-4 mt-4">
                        <button type="button" id="cancelExistingMember" class="px-6 py-1 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                            Cancel
                        </button>
                        <button type="button" id="okExistingMember" class="px-6 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sm">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Member Modal -->
        <div id="addNewMemberModal" class="inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50 lg:absolute fixed p-4" style="width: 100%; height: 100%;">
            <div class="bg-white shadow-xl w-full max-w-lg rounded-lg">
                <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add New Member</h2>
                <form id="addNewMemberForm">
                    <div class="bg-white rounded-b-lg p-4 space-y-4">
                        <div class="flex items-center space-x-4">
                            <label for="newMemberBranch" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Branch*</label>
                            <input type="text" id="newMemberBranch" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="newMemberCenter" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Center Name*</label>
                            <input type="text" id="newMemberCenter" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="newMemberGroup" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Group Name*</label>
                            <input type="text" id="newMemberGroup" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="newMemberFullName" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Full Name*</label>
                            <input type="text" id="newMemberFullName" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                        </div>
                        <div class="flex justify-between w-full space-x-4">
                            <div class="w-1/2 flex items-center space-x-4">
                                <label for="newMemberMobile01" class="block text-xs text-gray-400 mb-1 ml-2">Mobile Number 01</label>
                                <input type="tel" id="newMemberMobile01" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                            </div>
                            <div class="w-1/2 flex items-center space-x-4">
                                <label for="newMemberMobile02" class="block text-xs text-gray-400 mb-1 ml-2">Mobile Number 02</label>
                                <input type="tel" id="newMemberMobile02" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="newMemberAddress" class="block text-xs text-gray-400 mb-1 ml-2 w-36">Address?</label>
                            <input type="text" id="newMemberAddress" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                        </div>
                        <div class="flex justify-between">
                            <div class="w-1/2 flex items-center space-x-4">
                                <label for="newMemberNIC" class="block text-xs text-gray-400 mb-1 ml-2 w-36">NIC</label>
                                <input type="text" id="newMemberNIC" placeholder="" class="w-full p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                            </div>
                            <div class="w-1/2 flex items-center space-x-4 pl-8">
                                <label class="text-xs text-gray-400 w-1/2"><input type="radio" name="newMemberGender" value="Male" class="p-1 " /> Male</label>
                                <label class="text-xs text-gray-400 w-1/2"><input type="radio" name="newMemberGender" value="Female" class="p-1 " /> Female</label>

                            </div>
                        </div>
                        <div class="flex justify-between items-center space-x-4">
                            <div>
                                <label class="block text-xs text-gray-400 mb-1 ml-2">Image*</label>
                                <input type="file" id="newMemberImage" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                            </div>
                            <div>
                                <label class="block text-xs text-gray-400 mb-1 ml-2">Image*</label>
                                <input type="file" id="newMemberImage" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required />
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 mt-2">
                            <button type="button" id="cancelNewMember" class="px-6 py-1 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                                Cancel
                            </button>
                            <button type="submit" id="createNewMember" class="px-6 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sm">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex flex-col h-full lg:h-auto space-y-4 pb-4">
            <div class="flex w-full justify-between iteam-center">
                <div class="w-24 text-sm lg:text-xs  ">
                    <button id="getGroupSummary" value="" class="w-full bg-gray-100 text-gray-700 p-1 rounded-lg hover:bg-gray-300 focus:outline-none flex  items-center pl-4">
                        <img src="{{ asset('assets/icons/CaretLeft.svg') }}" alt="Pencil" class="h-3 w-3 m-1"> Back
                    </button>
                </div>
                <div class="w-40 text-sm lg:text-xs ">
                    <button id="getGroupSummary" value="" class="w-full bg-blue-600 text-white p-1 rounded-lg hover:bg-blue-700 focus:outline-none flex justify-center">
                        <img src="{{ asset('assets/icons/ArrowLineDownWhite.svg') }}" alt="Pencil" class="h-3 w-3 m-1"> Get Group Summary
                    </button>
                </div>

            </div>
            <div class="flex flex-col lg:flex-row border rounded-lg py-4 px-4 h-full ">
                <!-- Center Details -->
                <div class="w-full lg:w-2/3 h-full">
                    <h1 class="text-md font-medium text-gray-800 mb-2">Group Details</h1>
                    <div class="grid-cols-2 grid lg:grid-cols-3 gap-y-2 gap-x-4">
                        <!-- Name -->
                        <div>
                            <p class="text-xs text-gray-400">Name</p>
                            <p class="text-sm">
                                <span class="view-mode">Group 01</span>
                                <input type="text" class="edit-mode hidden border px-2 py-1 rounded w-full" value="Group 01-end">
                            </p>
                        </div>

                        <!-- Center Manager -->
                        <div>
                            <p class="text-xs text-gray-400">Center</p>
                            <p class="text-sm">
                                <span class="view-mode">Center name</span>
                                <input type="text" class="edit-mode hidden border px-2 py-1 rounded w-full" value="Center">
                            </p>
                        </div>

                        <!-- Branch -->
                        <div>
                            <p class="text-xs text-gray-400">Branch</p>
                            <p class="text-sm">
                                <span class="view-mode">Balangoda</span>
                                <input type="text" class="edit-mode hidden border px-2 py-1 rounded w-full" value="Balangoda">
                            </p>
                        </div>

                        <!-- Total Group -->
                        <div>
                            <p class="text-xs text-gray-400">Center Manager</p>
                            <p class="text-sm">
                                <span class="view-mode">Saman</span>
                                <input type="number" class="edit-mode hidden border px-2 py-1 rounded w-full" value="Saman">
                            </p>
                        </div>

                        <!-- Total Members -->
                        <div class="lg:block">
                            <p class="text-xs text-gray-400">Total Members</p>
                            <p class="text-sm">
                                <span class="view-mode">05</span>
                                <input type="number" class="edit-mode hidden border px-2 py-1 rounded w-full" value="05">
                            </p>
                        </div>

                        <!-- Payment Date -->
                        <div>
                            <p class="text-xs text-gray-400">Payment Date</p>
                            <p class="text-sm">
                                <span class="view-mode">2025.05.02</span>
                                <input type="date" class="edit-mode hidden border px-2 py-1 rounded w-full" value="2025-05-02">
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex w-full lg:w-1/3 justify-between lg:justify-end items-end space-x-2">
                    <div class="flex flex-row lg:space-x-2 bg-white lg:text-xs w-full justify-end">
                        <!-- Edit -->
                        <button id="editBtn" class="bg-blue-600 text-white p-1 lg:p-2 rounded-lg hover:bg-blue-700 flex items-center justify-center px-6 w-1/2 lg:w-28 mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/PencilSimpleWhite.svg') }}" alt="Edit" class="h-3 w-3 mr-2">
                            <span>Edit</span>
                        </button>

                        <!-- Save -->
                        <button id="saveBtn" class="bg-green-600 text-white p-1 lg:p-2 rounded-lg hover:bg-green-700 hidden  items-center justify-center px-6 w-1/2 lg:w-28  mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/VectorWhite.svg') }}" alt="Save" class="h-3 w-3 mr-2">
                            <span>Save</span>
                        </button>

                        <!-- Delete -->
                        <button id="deleteBtn" class="bg-red-600 text-white p-1 lg:p-2 rounded-lg hover:bg-red-700 flex items-center justify-center px-4 w-1/2 lg:w-28">
                            <img src="{{ asset('assets/icons/TrashWhite.svg') }}" alt="Delete" class="h-3 w-3 mr-2">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteModal" class="fixed inset-0  items-center justify-center bg-black bg-opacity-40 hidden z-50 h-full">
                <div class="bg-white p-6 rounded-lg shadow-md text-center w-1/3 h-30">
                    <p class="text-md font-semibold mb-4">Are you sure you want to delete this Group?</p>
                    <div class="flex justify-center space-x-4">
                        <button id="cancelDelete" class="bg-gray-300 text-black p-2 rounded-lg hover:bg-gray-500 flex items-center px-4 text-xs">
                            <span>Cancel</span>
                        </button>
                        <button id="confirmDelete" class="bg-red-600 text-white p-2 rounded-lg hover:bg-red-700 flex items-center px-4 text-xs">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 border-0 lg:py-2 lg:bg-sky-50 lg:border rounded-lg flex flex-col justify-between h-max ">

            <!-- Top Bar -->
            <div class="flex flex-col w-full space-y-2 p-2 lg:px-2 text-md lg:flex lg:flex-row lg:space-y-0 lg:justify-between lg:items-center lg:p-1">
                <div class="flex items-center  lg:space-x-2 w-full">
                    <!-- Filter Button -->
                    <div class="hidden lg:flex text-sm ">
                        <button value="" class="bg-white p-2 rounded-lg focus:outline-none border w-8">
                            <img src="{{ asset('assets/icons/Funnel.svg') }}" alt="Dashboard Icon" class="h-4 w-4">
                        </button>
                    </div>

                    <!-- Search Bar -->
                    <div class="w-full text-sm lg:text-xs lg:w-5/12">
                        <input type="text" id="searchMember" placeholder="Search Member..." class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" />
                    </div>
                </div>
                <!-- Add Center Button -->
                <div class="w-full text-sm lg:text-xs lg:w-3/12">
                    <button id="addMemberButton" value="add_new" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                        + Add Memeber
                    </button>
                </div>
            </div>

            <p class="text-center text-xs my-2 text-gray-400 lg:hidden">Total Centers 10</p>

            <!-- Centers Grid card format hidden for lg screens -->
            <div id="membersGrid" class="grid grid-cols-2 sm:grid-cols-2 lg:hidden gap-4 p-2">
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
                <!-- Additional cards omitted for brevity -->
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
                <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-group="Group02">
                    <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                        <div class="text-xs text-gray-600 text-right">Group 01</div>

                        <div class="text-xs flex items-center space-x-1 text-gray-700">
                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                            <p>Total Members - <span>12</span></p>
                        </div>
                    </div>
                    <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">25 000</div>
                </div>
            </div>

            <div class="flex justify-start h-full ">
                <!-- Grid Table format hidden for mobile screens -->
                <div id="membersGridTable" class="w-full max-h-[calc(100vh-400px)] hidden lg:block p-0  overflow-y-auto">
                    <div class="min-w-full ">
                        <table class="w-full min-w-max">
                            <thead class="w-full text-gray-700 text-xs font-light bg-gray-100 sticky top-0">
                                <tr class="uppercase w-full">
                                    <th class="py-2 text-center">#</th>
                                    <th class="py-2 text-left">Name</th>
                                    <th class="py-2 text-left">Center</th>
                                    <th class="py-2 text-left">NIC </th>
                                    <th class="py-2 text-left">Loan Balance</th>
                                    <th class="py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800 text-xs font-light bg-white">
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-member-id="1" data-member-name="Saman" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Saman</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-group-id="1" data-group-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-group-id="1" data-group-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-group-id="1" data-group-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-group-id="1" data-group-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                                <!-- AROW -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-group-id="1" data-group-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left"> 154782452v</td>
                                    <td class="py-2 text-left">400000</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="hidden mt-4 mx-4 lg:flex justify-between items-center text-xs text-gray-500">
                <span>1-10 of 87</span>
                <div class="flex justify-center items-center">
                    <div class="pr-8">
                        <select class="rounded bg-sky-50">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                        </select>
                        <span>Rows per page</span>
                    </div>
                    <button class="px-1 py-1 bg-gray-200 rounded hover:bg-sky-200">
                        <img src="{{ asset('assets/icons/CaretLeft.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                    </button>
                    <span class="px-2 text-xs">1/15</span>
                    <button class="px-1 py-1 bg-gray-200 rounded hover:bg-sky-200">
                        <img src="{{ asset('assets/icons/CaretRight.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Column: Row Details -->
    <div id="RowDetails" class="hidden h-full lg:w-4/12 flex-col justify-between transition-all duration-300">
        <div id="RowDetailsContent" class="border-b p-4">
            <h1 id="memberName" class="text-md font-medium text-gray-800 mb-1">Name</h1>
            <h1 id="memberName" class="text-xs text-gray-600 mb-4"><span>Branch</span> > <span>Center</span> > <span>Group</span></h1>
            <div class="grid grid-cols-2 gap-y-2">
                <div>
                    <p for="num01" class="text-xs text-gray-400">Mobile number 01</p>
                    <p id="num01" class="text-sm">+94 78 659823</p>
                </div>
                <div>
                    <p for="num02" class="text-xs text-gray-400">Mobile number 02</p>
                    <p id="num02" class="text-sm">+94 78 659428</p>
                </div>
                <div>
                    <p for="NIC" class="text-xs text-gray-400">NIC</p>
                    <p id="NIC" class="text-sm">2459876314</p>
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
                    <p id="memberAddress" class="text-sm mt-0">Balngoda,Sri lanka</p>
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
                    <button id="addLoanButton" value="add_new_loan" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                        + Add Loan
                    </button>
                </div>
            </div>
        </div>
        <div class=" p-4 border-t">
            <div class="w-full text-sm lg:text-xs  pt-4">
                <button id="ViewFullDetail" value="" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
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

    // Search Filter for both mobile and web views
    document.getElementById('searchMember').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        // Mobile view (cards)
        const cards = document.querySelectorAll('#membersGrid > div');
        cards.forEach(card => {
            const centerName = card.getAttribute('data-member').toLowerCase();
            card.style.display = centerName.includes(searchTerm) ? 'block' : 'none';
        });

        // Web view (table rows)
        const tableRows = document.querySelectorAll('#membersGridTable tbody tr');
        tableRows.forEach(row => {
            const centerName = row.getAttribute('data-member-name').toLowerCase();
            row.style.display = centerName.includes(searchTerm) ? 'table-row' : 'none';
        });
    });

    //Group Details edit and delete functionality
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const deleteBtn = document.getElementById('deleteBtn');
    const deleteModal = document.getElementById('deleteModal');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');

    editBtn.addEventListener('click', () => {
        document.querySelectorAll('.view-mode').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.edit-mode').forEach(el => el.classList.remove('hidden'));
        editBtn.classList.add('hidden');
        saveBtn.classList.remove('hidden');
        saveBtn.classList.add('flex');
    });

    saveBtn.addEventListener('click', () => {
        document.querySelectorAll('.edit-mode').forEach((input, i) => {
            const value = input.value;
            document.querySelectorAll('.view-mode')[i].textContent = value;
        });
        document.querySelectorAll('.view-mode').forEach(el => el.classList.remove('hidden'));
        document.querySelectorAll('.edit-mode').forEach(el => el.classList.add('hidden'));
        saveBtn.classList.add('hidden');
        editBtn.classList.remove('hidden');

        // TODO: Optional - Send updated values to backend via AJAX or form
        console.log("Saved successfully.");
    });

    deleteBtn.addEventListener('click', () => {
        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('flex');
    });

    cancelDelete.addEventListener('click', () => {
        deleteModal.classList.add('hidden');
    });

    confirmDelete.addEventListener('click', () => {
        deleteModal.classList.add('hidden');
        // TODO: Handle actual delete logic (AJAX or form submit)
        alert("Deleted group successfully.");
    });

    // Row Summey
    document.querySelectorAll('.view-details').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default link behavior
            const row = button.closest('tr');
            const RowDetails = document.getElementById('RowDetails');
            const firstColumn = document.getElementById('firstColumn');

            // Show second column
            RowDetails.classList.remove('hidden');
            firstColumn.classList.remove('lg:w-full');
            firstColumn.classList.add('lg:w-8/12');
            RowDetails.classList.add('lg:flex');

            // Update second column content
            const centerName = row.getAttribute('data-center-name');
            const manager = row.getAttribute('data-manager');
            const groups = row.getAttribute('data-groups');
            const member = row.getAttribute('data-member');
            const paymentDay = row.getAttribute('data-payment-day');

            document.getElementById('branchName').textContent = centerName;
            document.getElementById('Cname').textContent = centerName;
            document.getElementById('Cmanager').textContent = manager;
            document.getElementById('Tgroup').textContent = groups;
            document.getElementById('Tmember').textContent = member;
        });
    });

    // Add Member Modal
    const existingMembers = [{
            id: 1,
            name: "John Doe",
            nic: "982563142V"
        },
        {
            id: 2,
            name: "Jane Smith",
            nic: "983214567V"
        },
        {
            id: 3,
            name: "Saman Perera",
            nic: "981234567V"
        },
        {
            id: 4,
            name: "Kamal Silva",
            nic: "980123456V"
        },
        {
            id: 5,
            name: "Nimal Fernando",
            nic: "984321567V"
        }
    ];

    let selectedMembers = [];
    document.addEventListener('DOMContentLoaded', function() {
        // Open Add Group Modal
        document.getElementById('addMemberButton').addEventListener('click', function() {
            document.getElementById('addMemberModal').classList.remove('hidden');
            document.getElementById('addMemberModal').classList.add('flex');
        });

        // Add Existing Member Modal
        document.getElementById('addExistingMember').addEventListener('click', function() {
            document.getElementById('addExistingMemberModal').classList.remove('hidden');
            document.getElementById('addExistingMemberModal').classList.add('flex');
            renderExistingMembers();
        });

        document.getElementById('searchExistingMembers').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            renderExistingMembers(searchTerm);
        });

        document.getElementById('okExistingMember').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('#existingMembersList input[type="checkbox"]:checked');
            const newSelections = Array.from(checkboxes).map(cb => ({
                id: cb.value,
                name: cb.getAttribute('data-name'),
                nic: cb.getAttribute('data-nic'),
                type: 'existing'
            }));

            selectedMembers = [...selectedMembers, ...newSelections];
            if (selectedMembers.length > 6) {
                selectedMembers = selectedMembers.slice(0, 6); // Limit to 6
                alert("Maximum 6 members allowed. Excess members removed.");
            }
            document.getElementById('selectedMembers').textContent = selectedMembers.map(m => m.name).join(', ') || 'No members selected';
            document.getElementById('addExistingMemberModal').classList.add('hidden');
        });

        document.getElementById('cancelExistingMember').addEventListener('click', function() {
            document.getElementById('addExistingMemberModal').classList.add('hidden');
        });

        // Add New Member Modal
        document.getElementById('addNewMember').addEventListener('click', function() {
            document.getElementById('addNewMemberModal').classList.remove('hidden');
            document.getElementById('addNewMemberModal').classList.add('flex');
        });

        document.getElementById('cancelNewMember').addEventListener('click', function() {
            document.getElementById('addNewMemberModal').classList.add('hidden');
        });

        document.getElementById('createNewMember').addEventListener('click', function(e) {
            e.preventDefault();
            const newMember = {
                branch: document.getElementById('newMemberBranch').value,
                center: document.getElementById('newMemberCenter').value,
                group: document.getElementById('newMemberGroup').value,
                fullName: document.getElementById('newMemberFullName').value,
                mobile01: document.getElementById('newMemberMobile01').value,
                mobile02: document.getElementById('newMemberMobile02').value,
                address: document.getElementById('newMemberAddress').value,
                nic: document.getElementById('newMemberNIC').value,
                gender: document.querySelector('input[name="newMemberGender"]:checked')?.value,
                image: document.getElementById('newMemberImage').files[0],
                type: 'new'
            };

            if (!newMember.fullName || !newMember.image) {
                alert("Full Name and Image are required.");
                return;
            }

            selectedMembers.push(newMember);
            if (selectedMembers.length > 6) {
                selectedMembers.pop();
                alert("Maximum 6 members allowed. This member was not added.");
            } else {
                document.getElementById('selectedMembers').textContent = selectedMembers.map(m => m.fullName || m.name).join(', ') || 'No members selected';
            }
            document.getElementById('addNewMemberModal').classList.add('hidden');
            document.getElementById('addNewMemberForm').reset();
        });

        // Cancel Group Modal
        document.getElementById('cancelMember').addEventListener('click', function() {
            document.getElementById('addMemberModal').classList.add('hidden');
            document.getElementById('addmemberForm').reset();
            selectedMembers = [];
            document.getElementById('selectedMembers').textContent = 'No members selected';
        });

        function renderExistingMembers(searchTerm = '') {
            const list = document.getElementById('existingMembersList');
            list.innerHTML = '';
            const filteredMembers = existingMembers.filter(m => m.name.toLowerCase().includes(searchTerm));
            filteredMembers.forEach(member => {
                const div = document.createElement('div');
                div.className = 'flex items-center justify-between';
                div.innerHTML = `
            <span>${member.name} (${member.nic})</span>
            <input type="checkbox" value="${member.id}" data-name="${member.name}" data-nic="${member.nic}" class="form-checkbox h-4 w-4 text-blue-600 m-1">
        `;
                list.appendChild(div);
            });
        }

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