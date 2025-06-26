@extends('layouts.layout')

@section('contents')
<!--NOT Completed -->
<div id="mainContent" class="flex lg:h-full">
    <!-- First Column -->
     NOT Completed
    <!--Mobile Cards and table View-->
    <div id="firstColumn" class="w-full h-full p-2 lg:border-r lg:p-4 transition-all duration-300 lg:relative space-y-2">
        <div class="flex flex-col h-full lg:h-auto space-y-4 pb-4">
            <div class="flex w-full justify-between items-center">
                <div class="w-24 text-sm lg:text-xs">
                    <button id="getGroupSummary" value="" class="w-full bg-gray-100 text-gray-700 p-1 rounded-lg hover:bg-gray-300 focus:outline-none flex items-center pl-4">
                        <img src="{{ asset('assets/icons/CaretLeft.svg') }}" alt="Pencil" class="h-3 w-3 m-1"> Back
                    </button>
                </div>
                <div class="w-40 text-sm lg:text-xs">
                    <button id="getGroupSummary" value="" class="w-full bg-blue-600 text-white p-1 rounded-lg hover:bg-blue-700 focus:outline-none flex justify-center">
                        <img src="{{ asset('assets/icons/ArrowLineDownWhite.svg') }}" alt="Pencil" class="h-3 w-3 m-1"> Get Summary
                    </button>
                </div>
            </div>

            <!-- Customer Details Card -->
            <div class="flex flex-col lg:flex-row border rounded-lg py-2 px-4 h-full">
                <!-- Customer Details -->
                <div class="w-full lg:w-2/3 h-full">
                    <h1 class="text-md font-medium text-gray-800 mb-2">Customer Details</h1>
                    <div class="grid-cols-2 grid lg:grid-cols-3 gap-y-2 gap-x-4">
                        <!-- Name -->
                        <div>
                            <p class="text-xs text-gray-400">Name</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">Saman Perera</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="Saman Perera">
                            </p>
                        </div>
                        <!-- NIC -->
                        <div>
                            <p class="text-xs text-gray-400">NIC</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">2525555515151V</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="2525555515151V">
                            </p>
                        </div>
                        <!-- Attach (Images) -->
                        <div>
                            <p class="text-xs text-gray-400">Attach (Images)</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">2 Images</span>
                                <input type="file" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" multiple accept="image/*">
                            </p>
                        </div>
                        <!-- Mobile Number 01 -->
                        <div>
                            <p class="text-xs text-gray-400">Mobile Number 01</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">0712345678</span>
                                <input type="tel" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="0712345678">
                            </p>
                        </div>
                        <!-- Mobile Number 02 -->
                        <div>
                            <p class="text-xs text-gray-400">Mobile Number 02</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">0778765432</span>
                                <input type="tel" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="0778765432">
                            </p>
                        </div>
                        <!-- Address -->
                        <div class="c">
                            <p class="text-xs text-gray-400">Address</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">123, Main Street, Balangoda</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="123, Main Street, Balangoda">
                            </p>
                        </div>
                        <!-- Branch -->
                        <div>
                            <p class="text-xs text-gray-400">Branch</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">Balangoda</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="Balangoda">
                            </p>
                        </div>
                        <!-- Center -->
                        <div>
                            <p class="text-xs text-gray-400">Center</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">Center Name</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="Center Name">
                            </p>
                        </div>
                        <!-- Group -->
                        <div>
                            <p class="text-xs text-gray-400">Group</p>
                            <p class="text-sm">
                                <span class="view-mode-customer">Group 01</span>
                                <input type="text" class="edit-mode-customer hidden border px-2 py-1 rounded w-full" value="Group 01">
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="flex w-full lg:w-1/3 justify-between lg:justify-end items-end space-x-2 pt-4">
                    <div class="flex flex-row lg:space-x-2 bg-white lg:text-xs w-full justify-end">
                        <!-- Edit -->
                        <button id="editCustomerBtn" class="bg-blue-600 text-white p-1 lg:p-2 rounded-lg hover:bg-blue-700 flex items-center justify-center px-6 w-1/2 lg:w-28 mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/PencilSimpleWhite.svg') }}" alt="Edit" class="h-3 w-3 mr-2">
                            <span>Edit</span>
                        </button>
                        <!-- Save -->
                        <button id="saveCustomerBtn" class="bg-green-600 text-white p-1 lg:p-2 rounded-lg hover:bg-green-700 hidden items-center justify-center px-6 w-1/2 lg:w-28 mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/VectorWhite.svg') }}" alt="Save" class="h-3 w-3 mr-2">
                            <span>Save</span>
                        </button>
                        <!-- Delete -->
                        <button id="deleteCustomerBtn" class="bg-red-600 text-white p-1 lg:p-2 rounded-lg hover:bg-red-700 flex items-center justify-center px-4 w-1/2 lg:w-28">
                            <img src="{{ asset('assets/icons/TrashWhite.svg') }}" alt="Delete" class="h-3 w-3 mr-2">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal for Customer -->
            <div id="deleteCustomerModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-40 hidden z-50 h-full">
                <div class="bg-white p-6 rounded-lg shadow-md text-center w-1/3 h-30">
                    <p class="text-md font-semibold mb-4">Are you sure you want to delete this Customer?</p>
                    <div class="flex justify-center space-x-4">
                        <button id="cancelCustomerDelete" class="bg-gray-300 text-black p-2 rounded-lg hover:bg-gray-500 flex items-center px-4 text-xs">
                            <span>Cancel</span>
                        </button>
                        <button id="confirmCustomerDelete" class="bg-red-600 text-white p-2 rounded-lg hover:bg-red-700 flex items-center px-4 text-xs">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Current Loan Card -->
            <div class="flex flex-col lg:flex-row border rounded-lg py-2 px-4 h-full">
                <!-- Current Loan Details -->
                <div class="w-full lg:w-2/3 h-full">
                    <h1 class="text-md font-medium text-gray-800 mb-2">Current Loan</h1>
                    <div class="grid-cols-2 grid lg:grid-cols-3 gap-y-2 gap-x-4">
                        <!-- Loan Amount -->
                        <div>
                            <p class="text-xs text-gray-400">Loan Amount</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">400000</span>
                                <input type="number" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="400000">
                            </p>
                        </div>
                        <!-- Interest -->
                        <div>
                            <p class="text-xs text-gray-400">Interest</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">5%</span>
                                <input type="text" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="5%">
                            </p>
                        </div>
                        <!-- Issue Date -->
                        <div>
                            <p class="text-xs text-gray-400">Issue Date</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">2025.01.01</span>
                                <input type="date" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="2025-01-01">
                            </p>
                        </div>
                        <!-- Installment -->
                        <div>
                            <p class="text-xs text-gray-400">Installment</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">10000</span>
                                <input type="number" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="10000">
                            </p>
                        </div>
                        <!-- Terms -->
                        <div>
                            <p class="text-xs text-gray-400">Terms</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">12 Months</span>
                                <input type="text" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="12 Months">
                            </p>
                        </div>
                        <!-- Document Charges -->
                        <div>
                            <p class="text-xs text-gray-400">Document Charges</p>
                            <p class="text-sm">
                                <span class="view-mode-loan">5000</span>
                                <input type="number" class="edit-mode-loan hidden border px-2 py-1 rounded w-full" value="5000">
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="flex w-full lg:w-1/3 justify-between lg:justify-end items-end space-x-2 pt-4">
                    <div class="flex flex-row lg:space-x-2 bg-white lg:text-xs w-full justify-end">
                        <!-- Edit -->
                        <button id="editLoanBtn" class="bg-blue-600 text-white p-1 lg:p-2 rounded-lg hover:bg-blue-700 flex items-center justify-center px-6 w-1/2 lg:w-28 mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/PencilSimpleWhite.svg') }}" alt="Edit" class="h-3 w-3 mr-2">
                            <span>Edit</span>
                        </button>
                        <!-- Save -->
                        <button id="saveLoanBtn" class="bg-green-600 text-white p-1 lg:p-2 rounded-lg hover:bg-green-700 hidden items-center justify-center px-6 w-1/2 lg:w-28 mr-2 lg:mr-0">
                            <img src="{{ asset('assets/icons/VectorWhite.svg') }}" alt="Save" class="h-3 w-3 mr-2">
                            <span>Save</span>
                        </button>
                        <!-- Delete -->
                        <button id="deleteLoanBtn" class="bg-red-600 text-white p-1 lg:p-2 rounded-lg hover:bg-red-700 flex items-center justify-center px-4 w-1/2 lg:w-28 just">
                            <img src="{{ asset('assets/icons/TrashWhite.svg') }}" alt="Delete" class="h-3 w-3 mr-2">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal for Loan -->
            <div id="deleteLoanModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-40 hidden z-50 h-full">
                <div class="bg-white p-6 rounded-lg shadow-md text-center w-1/3 h-30">
                    <p class="text-md font-semibold mb-4">Are you sure you want to delete this Loan?</p>
                    <div class="flex justify-center space-x-4">
                        <button id="cancelLoanDelete" class="bg-gray-300 text-black p-2 rounded-lg hover:bg-gray-500 flex items-center px-4 text-xs">
                            <span>Cancel</span>
                        </button>
                        <button id="confirmLoanDelete" class="bg-red-600 text-white p-2 rounded-lg hover:bg-red-700 flex items-center px-4 text-xs">
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Existing Members Grid and Table -->
            <div class="p-0 border-0 lg:py-2 lg:bg-sky-50 lg:border rounded-lg flex flex-col justify-between h-max">
                <!-- Top Bar -->
                <div class="flex flex-col w-full space-y-2 p-2 lg:px-2 text-md lg:flex lg:flex-row lg:space-y-0 lg:justify-between lg:items-center lg:p-1">
                    <div class="flex items-center lg:space-x-2 w-full">
                        <!-- Filter Button -->
                        <div class="hidden lg:flex text-sm">
                            <button value="" class="bg-white p-2 rounded-lg focus:outline-none border w-8">
                                <img src="{{ asset('assets/icons/Funnel.svg') }}" alt="Dashboard Icon" class="h-4 w-4">
                            </button>
                        </div>
                        <!-- Search Bar -->
                        <div class="w-full text-sm lg:text-xs lg:w-5/12">
                            <input type="text" id="searchMember" placeholder="Search Member..." class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" />
                        </div>
                    </div>
                    <!-- Add Member Button -->
                    <div class="w-full text-sm lg:text-xs lg:w-3/12">
                        <button id="addMemberButton" value="add_new" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                            + Add Member
                        </button>
                    </div>
                </div>
                <p class="text-center text-xs my-2 text-gray-400 lg:hidden">Total members 10</p>

                <!-- Members Grid card format hidden for lg screens -->
                <div id="membersGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:hidden gap-4 p-2">
                    <div class="rounded-lg shadow-sm flex flex-col justify-between w-full bg-gray-100 border hover:bg-gray-200" data-member-name="saman">
                        <div class="py-2 px-4 flex flex-row justify-between space-y-1">
                            <div class="text-xs text-gray-600 text-left">
                                <p class="text-sm font-bold text-gray-700">saman <span> - Center</span></p>
                                <p class="text-xs text-gray-400">2525555515151V</p>
                            </div>
                            <div class="text-xs flex items-center space-x-1 text-gray-700">
                                <p class="text-sm font-bold text-gray-700">11515155</p>
                            </div>
                        </div>
                    </div>
                    <!-- Additional cards -->
                    <div class="rounded-lg shadow-sm flex flex-col justify-between w-full bg-gray-100 border hover:bg-gray-200" data-member-name="saman">
                        <div class="py-2 px-4 flex flex-row justify-between space-y-1">
                            <div class="text-xs text-gray-600 text-left">
                                <p class="text-sm font-bold text-gray-700">saman <span> - Center</span></p>
                                <p class="text-xs text-gray-400">2525555515151V</p>
                            </div>
                            <div class="text-xs flex items-center space-x-1 text-gray-700">
                                <p class="text-sm font-bold text-gray-700">11515155</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow-sm flex flex-col justify-between w-full bg-gray-100 border hover:bg-gray-200" data-member-name="saman">
                        <div class="py-2 px-4 flex flex-row justify-between space-y-1">
                            <div class="text-xs text-gray-600 text-left">
                                <p class="text-sm font-bold text-gray-700">saman <span> - Center</span></p>
                                <p class="text-xs text-gray-400">2525555515151V</p>
                            </div>
                            <div class="text-xs flex items-center space-x-1 text-gray-700">
                                <p class="text-sm font-bold text-gray-700">11515155</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow-sm flex flex-col justify-between w-full bg-gray-100 border hover:bg-gray-200" data-member-name="saman">
                        <div class="py-2 px-4 flex flex-row justify-between space-y-1">
                            <div class="text-xs text-gray-600 text-left">
                                <p class="text-sm font-bold text-gray-700">saman <span> - Center</span></p>
                                <p class="text-xs text-gray-400">2525555515151V</p>
                            </div>
                            <div class="text-xs flex items-center space-x-1 text-gray-700">
                                <p class="text-sm font-bold text-gray-700">11515155</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg shadow-sm flex flex-col justify-between w-full bg-gray-100 border hover:bg-gray-200" data-member-name="saman">
                        <div class="py-2 px-4 flex flex-row justify-between space-y-1">
                            <div class="text-xs text-gray-600 text-left">
                                <p class="text-sm font-bold text-gray-700">saman <span> - Center</span></p>
                                <p class="text-xs text-gray-400">2525555515151V</p>
                            </div>
                            <div class="text-xs flex items-center space-x-1 text-gray-700">
                                <p class="text-sm font-bold text-gray-700">11515155</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid Table format hidden for mobile screens -->
                <div id="membersGridTable" class="w-full max-h-[calc(100vh-400px)] hidden lg:block p-0 overflow-y-auto">
                    <div class="min-w-full">
                        <table class="w-full min-w-max">
                            <thead class="w-full text-gray-700 text-xs font-light bg-gray-100 sticky top-0">
                                <tr class="uppercase w-full">
                                    <th class="py-2 text-center">#</th>
                                    <th class="py-2 text-left">Name</th>
                                    <th class="py-2 text-left">Center</th>
                                    <th class="py-2 text-left">NIC</th>
                                    <th class="py-2 text-left">Loan Balance</th>
                                    <th class="py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800 text-xs font-light bg-white">
                                <!-- Row -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg view-details" data-member-id="1" data-member-name="Saman" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Saman</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left">154782452v</td>
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
                                <!-- Additional Rows -->
                                <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg view-details" data-group-id="1" data-member-name="Group 01" data-members="04" data-received="40000" data-center="Malwaragoda">
                                    <td class="py-2 text-center">001</td>
                                    <td class="py-2 text-left">Group01</td>
                                    <td class="py-2 text-left">Center</td>
                                    <td class="py-2 text-left">154782452v</td>
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
                                <!-- Repeat rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add alternating background colors to table rows
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#membersGridTable tbody tr');
        rows.forEach((row, index) => {
            row.classList.add(index % 2 === 0 ? 'bg-white' : 'bg-gray-100');
            row.classList.add('hover:bg-sky-100');
        });
    });

    // Search Filter for both mobile and web views
    document.getElementById('searchMember').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        // Mobile view (cards)
        const cards = document.querySelectorAll('#membersGrid > div');
        cards.forEach(card => {
            const memberName = card.getAttribute('data-member-name').toLowerCase();
            card.style.display = memberName.includes(searchTerm) ? 'block' : 'none';
        });
        // Web view (table rows)
        const tableRows = document.querySelectorAll('#membersGridTable tbody tr');
        tableRows.forEach(row => {
            const memberName = row.getAttribute('data-member-name').toLowerCase();
            row.style.display = memberName.includes(searchTerm) ? 'table-row' : 'none';
        });
    });

    // Customer Details edit and delete functionality
    const editCustomerBtn = document.getElementById('editCustomerBtn');
    const saveCustomerBtn = document.getElementById('saveCustomerBtn');
    const deleteCustomerBtn = document.getElementById('deleteCustomerBtn');
    const deleteCustomerModal = document.getElementById('deleteCustomerModal');
    const cancelCustomerDelete = document.getElementById('cancelCustomerDelete');
    const confirmCustomerDelete = document.getElementById('confirmCustomerDelete');

    editCustomerBtn.addEventListener('click', () => {
        document.querySelectorAll('.view-mode-customer').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.edit-mode-customer').forEach(el => el.classList.remove('hidden'));
        editCustomerBtn.classList.add('hidden');
        saveCustomerBtn.classList.remove('hidden');
        saveCustomerBtn.classList.add('flex');
    });

    saveCustomerBtn.addEventListener('click', () => {
        document.querySelectorAll('.edit-mode-customer').forEach((input, i) => {
            if (input.type !== 'file') {
                const value = input.value;
                document.querySelectorAll('.view-mode-customer')[i].textContent = value;
            } else {
                const files = input.files;
                document.querySelectorAll('.view-mode-customer')[i].textContent = files.length > 0 ? `${files.length} Images` : 'No Images';
            }
        });
        document.querySelectorAll('.view-mode-customer').forEach(el => el.classList.remove('hidden'));
        document.querySelectorAll('.edit-mode-customer').forEach(el => el.classList.add('hidden'));
        saveCustomerBtn.classList.add('hidden');
        editCustomerBtn.classList.remove('hidden');
        console.log("Customer details saved successfully.");
    });

    deleteCustomerBtn.addEventListener('click', () => {
        deleteCustomerModal.classList.remove('hidden');
        deleteCustomerModal.classList.add('flex');
    });

    cancelCustomerDelete.addEventListener('click', () => {
        deleteCustomerModal.classList.add('hidden');
    });

    confirmCustomerDelete.addEventListener('click', () => {
        deleteCustomerModal.classList.add('hidden');
        alert("Customer deleted successfully.");
    });

    // Current Loan edit and delete functionality
    const editLoanBtn = document.getElementById('editLoanBtn');
    const saveLoanBtn = document.getElementById('saveLoanBtn');
    const deleteLoanBtn = document.getElementById('deleteLoanBtn');
    const deleteLoanModal = document.getElementById('deleteLoanModal');
    const cancelLoanDelete = document.getElementById('cancelLoanDelete');
    const confirmLoanDelete = document.getElementById('confirmLoanDelete');

    editLoanBtn.addEventListener('click', () => {
        document.querySelectorAll('.view-mode-loan').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.edit-mode-loan').forEach(el => el.classList.remove('hidden'));
        editLoanBtn.classList.add('hidden');
        saveLoanBtn.classList.remove('hidden');
        saveLoanBtn.classList.add('flex');
    });

    saveLoanBtn.addEventListener('click', () => {
        document.querySelectorAll('.edit-mode-loan').forEach((input, i) => {
            const value = input.value;
            document.querySelectorAll('.view-mode-loan')[i].textContent = value;
        });
        document.querySelectorAll('.view-mode-loan').forEach(el => el.classList.remove('hidden'));
        document.querySelectorAll('.edit-mode-loan').forEach(el => el.classList.add('hidden'));
        saveLoanBtn.classList.add('hidden');
        editLoanBtn.classList.remove('hidden');
        console.log("Loan details saved successfully.");
    });

    deleteLoanBtn.addEventListener('click', () => {
        deleteLoanModal.classList.remove('hidden');
        deleteLoanModal.classList.add('flex');
    });

    cancelLoanDelete.addEventListener('click', () => {
        deleteLoanModal.classList.add('hidden');
    });

    confirmLoanDelete.addEventListener('click', () => {
        deleteLoanModal.classList.add('hidden');
        alert("Loan deleted successfully.");
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
</style>
@endsection