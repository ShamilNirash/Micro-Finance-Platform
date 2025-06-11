@extends('layouts.mainLayout')

@section('content')
<div class="flex h-full w-full bg-white">
    <div class="hidden lg:flex">
        @include('shared.sidebar')
    </div>

    <div class="h-full w-full">
        <!-- Mobile Dropdown -->
        @include('shared.mobiledropdown')

        <!-- Main Content -->
        <main class="flex-1 lg:flex flex-col w-full h-full lg:p-0">
            <!-- Topbar -->
            @include('shared.navbar')

            <div class="flex lg:h-full">
                <!-- First Column -->
                <div id="firstColumn" class="w-full h-full p-2 lg:border-r lg:p-4 transition-all duration-300   ">
                    <!-- Add New Branch Modal -->
                    <div id="addBranchModal" class="bg-gray-600 bg-opacity-50 hidden absolute inset-0 flex items-center justify-center z-50" style="width: 100%; height: 100%;">
                        <div class="shadow-xl w-full max-w-md rounded-lg">
                            <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add New Branch</h2>
                            <div class="bg-white rounded-b-lg p-4">
                                <form action="" method="get">
                                    <div>
                                        <label for="branchName" class="block text-xs text-gray-400 mb-1 ml-2">Branch Name</label>
                                        <input type="text" id="branchName" placeholder="" class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                    </div>
                                    <div class="flex justify-end space-x-4 mt-4">
                                        <button id="cancelBranch" type="button" class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                                            Cancel
                                        </button>
                                        <button id="createBranch" type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sm">
                                            Create
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Add New Center Modal -->
                    <div id="addCenterModal" class=" inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
                        <div class="bg-white shadow-xl w-full max-w-md rounded-lg">
                            <h2 class="text-md bg-blue-100 rounded-t-lg p-4">Add New Center</h2>
                            <form>
                                <div class="bg-white rounded-b-lg p-4 space-y-4">
                                    <div>
                                        <label for="centerBranch" class="block text-xs text-gray-400 mb-1 ml-2">Branch*</label>
                                        <input type="text" id="centerBranch" placeholder="" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                    </div>
                                    <div>
                                        <label for="centerName" class="block text-xs text-gray-400 mb-1 ml-2">Center Name*</label>
                                        <input type="text" id="centerName" placeholder="" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                    </div>
                                    <div>
                                        <label for="paymentDate" class="block text-xs text-gray-400 mb-1 ml-2">Payment Date</label>
                                        <input type="date" id="paymentDate" placeholder="" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                    </div>
                                    <div>
                                        <label for="manager" class="block text-xs text-gray-400 mb-1 ml-2">Manager</label>
                                        <input type="text" id="manager" placeholder="" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" />
                                    </div>
                                    <div class="flex justify-end space-x-4 mt-4">
                                        <button id="cancelCenter" type="button" class="px-6 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 focus:outline-none text-sm">
                                            Cancel
                                        </button>
                                        <button id="createCenter" type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-sm">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="p-0 border-0 lg:py-2 lg:bg-sky-50 lg:border rounded-lg flex flex-col justify-between h-full">
                        <!-- Top Bar -->
                        <div class="flex flex-col w-full space-y-2 p-2 lg:px-2 text-md lg:flex lg:flex-row lg:space-y-0 lg:justify-between lg:items-center lg:p-1">
                                                        <!-- Filter Button -->
                        <div class="hidden lg:flex text-sm">
                                <button value="" class="bg-white p-2 rounded-lg focus:outline-none border w-8">
                                    <img src="{{ asset('assets/icons/DiamondsFour.svg') }}" alt="Dashboard Icon" class="h-4 w-4">
                                </button>
                            </div>
                            <!-- Hidden native select for form submission -->
                            <div class="flex flex-col lg:flex-row justify-between items-center w-full lg:justify-normal lg:items-baseline lg:w-3/12">
                                <div class="w-full lg:mb-0 relative text-sm">
                                    <select id="branchSelect" name="branch" class="w-full absolute p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none hidden text-sm lg:text-xs">
                                        <option class="text-sm" value="">Select Branch</option>
                                        <option value="add_new">+ Add New Branch</option>
                                        <option value="balangoda">Balangoda</option>
                                        <option value="ella">Ella</option>
                                        <option value="badulla">Badulla</option>
                                        <option value="colombo">Colombo</option>
                                    </select>
                                    <!-- Custom dropdown trigger -->
                                    <div id="dropdownTrigger" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white cursor-pointer flex items-center justify-between lg:text-xs" onclick="toggleDropdown()">
                                        <span id="selectedOption">Select Branch</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>

                                    <!-- Custom dropdown menu -->
                                    <div id="dropdownMenu" class="hidden absolute z-10 w-full bg-white border rounded-lg mt-1 shadow-lg lg:text-xs">
                                        <ul class="py-1 px-8 lg:px-4 lg:text-xs">
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs" data-value="add_new">+ Add New Branch</li>
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs" data-value="balangoda">Balangoda</li>
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs" data-value="ella">Ella</li>
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs" data-value="badulla">Badulla</li>
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs" data-value="colombo">Colombo</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Search Bar -->
                            <div class="w-full text-sm lg:text-xs lg:w-5/12">
                                <input type="text" id="searchCenter" placeholder="Search Center..." class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" />
                            </div>
                            <!-- Add Center Button -->
                            <div class="w-full text-sm lg:text-xs lg:w-3/12">
                                <button id="addCenterButton" value="add_new" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                                    + Add Center
                                </button>
                            </div>
                        </div>

                        <p class="text-center text-xs my-2 text-gray-400 lg:hidden">Total Centers 10</p>

                        <!-- Centers Grid card format hidden for lg screens -->
                        <div id="centersGrid" class="grid grid-cols-2 sm:grid-cols-2 lg:hidden gap-4 p-2">
                            <div class="rounded-lg shadow flex flex-col justify-between w-full bg-blue-100 hover:bg-blue-200" data-center="Malwaragoda">
                                <div class="h-24 py-2 px-4 flex flex-col justify-between space-y-1">
                                    <div class="text-xs text-gray-600 text-right">002</div>
                                    <div class="text-sm">Malwaragoda</div>
                                    <div class="text-xs flex items-center space-x-1 text-gray-700">
                                        <img src="{{ asset('assets/icons/DiamondsFour.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                        <p>Tuesday</p>
                                    </div>
                                    <div class="text-xs flex items-center space-x-1 text-gray-700">
                                        <img src="{{ asset('assets/icons/DiamondsFour.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                        <p>Tuesday</p>
                                    </div>
                                </div>
                                <div class="h-8 flex items-center justify-center text-sm font-semibold bg-blue-50 text-gray-700">GROUPS 04</div>
                            </div>
                            <!-- Additional cards omitted for brevity -->
                        </div>

                        <!-- Centers Grid Table format hidden for mobile screens -->
                        <div id="centersGridTable" class="w-full h-full hidden lg:block p-0 pt-2">
                            <table class="min-w-full rounded">
                                <thead class="w-full text-gray-700 text-xs font-light">
                                    <tr class="uppercase w-full">
                                        <th class="py-2 text-center">
                                            <input type="checkbox" id="select-all" class="form-checkbox h-4 w-4 text-blue-400 m-1">
                                        </th>
                                        <th class="py-2 px-2 text-center">#</th>
                                        <th class="py-2 text-left">Center Name</th>
                                        <th class="py-2 text-left">Groups</th>
                                        <th class="py-2 text-left">Center Manager</th>
                                        <th class="py-2 text-left">Payment Day</th>
                                        <th class="py-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-800 text-xs font-light bg-white">
                                    <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details" data-center-id="1" data-center-name="Malwaragoda" data-manager="John Doe" data-groups="4" data-members="20" data-payment-day="Tuesday">
                                        <td class="py-2 text-center">
                                            <input type="checkbox" name="selected_ids[]" value="1" class="form-checkbox h-4 w-4 text-blue-600">
                                        </td>
                                        <td class="py-2 text-center">001</td>
                                        <td class="py-2 text-left">Malwaragoda</td>
                                        <td class="py-2 text-left">4</td>
                                        <td class="py-2 text-left">John Doe</td>
                                        <td class="py-2 text-left">Tuesday</td>
                                        <td class="py-2 text-center flex justify-center items-center gap-1">
                                            <a href="#" class="border rounded hover:bg-green-500">
                                                <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                            </a>
                                            <a href="#" class="border rounded hover:bg-sky-500">
                                                <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Additional rows with placeholder data -->
                                    <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg view-details" data-center-id="2" data-center-name="Colombo" data-manager="Jane Smith" data-groups="5" data-members="25" data-payment-day="Wednesday">
                                        <td class="py-2 text-center">
                                            <input type="checkbox" name="selected_ids[]" value="2" class="form-checkbox h-4 w-4 text-blue-600">
                                        </td>
                                        <td class="py-2 text-center">202</td>
                                        <td class="py-2 text-left">Colombo</td>
                                        <td class="py-2 text-left">5</td>
                                        <td class="py-2 text-left">Jane Smith</td>
                                        <td class="py-2 text-left">Wednesday</td>
                                        <td class="py-2 text-center flex justify-center items-center gap-1">
                                            <a href="#" class="border rounded hover:bg-green-500 ">
                                                <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                            </a>
                                            <a href="#" class="border rounded hover:bg-sky-500">
                                                <img src="{{ asset('assets/icons/PencilSimple.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
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
                                <button class="px-1 py-1 bg-gray-200 rounded">
                                    <img src="{{ asset('assets/icons/CaretRight.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                </button>
                                <span class="px-2 text-xs">1/15</span>
                                <button class="px-1 py-1 bg-gray-200 rounded">
                                    <img src="{{ asset('assets/icons/CaretRight.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Column -->
                <div id="secondColumn" class="hidden h-full lg:w-4/12 flex-col justify-between transition-all duration-300">
                    <div id="secondColumnContent"  class="border-b p-4">
                        <h1 id="branchName" class="text-md font-medium text-gray-800 mb-4">Balangoda</h1>
                        <div class="grid grid-cols-2 gap-y-2">
                            <div>
                                <p for="Cname" class="text-xs text-gray-400">Center Name</p>
                                <p id="Cname" class="text-sm">001 Center Name</p>
                            </div>
                            <div>
                                <p for="Cmanager" class="text-xs text-gray-400">Center Manager</p>
                                <p id="Cmanager" class="text-sm">Center Manager</p>
                            </div>
                            <div>
                                <p for="Tgroup" class="text-xs text-gray-400">Total Groups</p>
                                <p id="Tgroup" class="text-sm">Total Groups</p>
                            </div>
                            <div>
                                <p for="TMembers" class="text-xs text-gray-400">Total Members</p>
                                <p id="TMembers" class="text-sm mt-0">Center Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 space-y-4 h-full">
                        <div class="space-y-2 flex flex-col justify-start">
                            <div class="flex justify-between items-center bg-sky-50 border rounded-lg">
                                <span class="text-xs font-medium text-gray-600 p-2">Group 01</span>
                                <span class="text-xs font-medium text-gray-800 bg-gray-200 p-2 px-8 rounded-lg">06</span>
                                <div class="font-medium text-gray-800 px-2 text-xs flex space-x-1">
                                    <a href="#" class="border rounded hover:bg-green-500">
                                        <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye" class="h-3 w-3 m-1">
                                    </a>
                                    <a href="#" class="border rounded hover:bg-red-500">
                                        <img src="{{ asset('assets/icons/GearSix.svg') }}" alt="Pencil" class="h-3 w-3 m-1">
                                    </a>
                                </div>
                            </div>
                            <!-- Additional group rows omitted for brevity -->
                        </div>
                    </div>
                    <div class="w-full text-sm lg:text-xs border-t p-4">
                        <button value="add_group" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none w-full">
                            + Add Group
                        </button>
                    </div>
                </div>
            </div>
        </main>

        </div>
    </div>
    <style>
    #firstColumn #addBranchModal,
#firstColumn #addCenterModal {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 50;
}

#firstColumn #addBranchModal > div,
#firstColumn #addCenterModal > div {
    position: relative;
    z-index: 51;
}
</style>


    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const closeMobileMenu = document.getElementById('closeMobileMenu');

        mobileMenuButton.addEventListener('click', () => {
            mobileSidebar.classList.toggle('hidden');
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileSidebar.classList.add('hidden');
        });

        // Sidebar Toggle (Desktop)
        const sidebar = document.getElementById('sidebar');
        const sidebarToggleButton = document.getElementById('sidebarToggleButton');

        sidebarToggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('w-20');
            sidebar.classList.toggle('w-52');
            const arrows = sidebar.querySelectorAll('.arrow');
            arrows.forEach(arrow => arrow.classList.toggle('hidden'));
            const submenus = sidebar.querySelectorAll('.submenu');
            submenus.forEach(submenu => submenu.classList.add('hidden')); // Close submenus on toggle
        });

        // Sidebar Submenu Toggle (for both mobile and web)
        const sidebarToggles = document.querySelectorAll('.sidebar-toggle');

        sidebarToggles.forEach(toggle => {
            toggle.addEventListener('click', (event) => {
                const submenu = toggle.nextElementSibling;
                const arrow = toggle.querySelector('.arrow');
                const isMinimized = sidebar.classList.contains('w-20');

                // Close all other submenus
                const allSubmenus = document.querySelectorAll(' .submenu');
                allSubmenus.forEach(otherSubmenu => {
                    if (otherSubmenu !== submenu) {
                        otherSubmenu.classList.add('hidden');
                        const otherArrow = otherSubmenu.previousElementSibling.querySelector('.arrow');
                        if (otherArrow) otherArrow.classList.remove('rotate-180');
                    }
                });

                // Toggle the current submenu
                submenu.classList.toggle('hidden');
                if (arrow) arrow.classList.toggle('rotate-180');

                // Position submenu next to the clicked button in minimized state
                if (isMinimized && submenu.classList.contains('hidden') === false) {
                    const toggleRect = toggle.getBoundingClientRect();
                    const sidebarRect = sidebar.getBoundingClientRect();
                    submenu.style.top = `${toggleRect.top - sidebarRect.top}px`;
                }
            });
        });

        // Active Page Highlighting
        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname;
            const links = document.querySelectorAll('#sidebar a, #mobileSidebar a');

            links.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });

        //------------------------//

// Show/Hide Add Branch Modal (confined to first column)
document.getElementById('branchSelect').addEventListener('change', function() {
    if (this.value === 'add_new') {
        document.getElementById('addBranchModal').classList.remove('hidden');
    }
});

document.getElementById('cancelBranch').addEventListener('click', function() {
    document.getElementById('addBranchModal').classList.add('hidden');
    document.getElementById('branchSelect').value = '';
});

document.getElementById('createBranch').addEventListener('click', function() {
    const branchName = document.getElementById('branchName').value;
    if (branchName) {
        const option = document.createElement('option');
        option.value = branchName.toLowerCase();
        option.text = branchName;
        document.getElementById('branchSelect').appendChild(option);
        document.getElementById('branchSelect').value = branchName.toLowerCase();
        document.getElementById('addBranchModal').classList.add('hidden');
        document.getElementById('branchName').value = '';

        // Update second column with branch list
        updateSecondColumn('branchList', [branchName]);
    }
});
// Show/Hide Add Center Modal (confined to first column)
document.getElementById('addCenterButton').addEventListener('click', function() {
    document.getElementById('addCenterModal').classList.remove('hidden');
});

document.getElementById('cancelCenter').addEventListener('click', function() {
    document.getElementById('addCenterModal').classList.add('hidden');
    document.getElementById('centerBranch').value = '';
    document.getElementById('centerName').value = '';
    document.getElementById('paymentDate').value = '';
    document.getElementById('manager').value = '';
});

document.getElementById('createCenter').addEventListener('click', function() {
    const branch = document.getElementById('centerBranch').value;
    const centerName = document.getElementById('centerName').value;
    if (branch && centerName) {
        console.log('New Center Added:', {
            branch,
            centerName,
            paymentDate: document.getElementById('paymentDate').value,
            manager: document.getElementById('manager').value
        });
        document.getElementById('addCenterModal').classList.add('hidden');
        document.getElementById('centerBranch').value = '';
        document.getElementById('centerName').value = '';
        document.getElementById('paymentDate').value = '';
        document.getElementById('manager').value = '';

        // Update second column with center details or list
        updateSecondColumn('centerDetails', { branch, centerName });
    }
});



        // Search Filter
        document.getElementById('searchCenter').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('#centersGrid > div');
            cards.forEach(card => {
                const centerName = card.getAttribute('data-center').toLowerCase();
                if (centerName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
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

        //check box selection
        document.getElementById('select-all').addEventListener('change', function(e) {
            let checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
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

        // Handle Add Center button
        document.getElementById('addCenterButton').addEventListener('click', () => {
            document.getElementById('addCenterModal').classList.remove('hidden');
        });

        // Handle Cancel buttons
        document.getElementById('cancelBranch').addEventListener('click', () => {
            document.getElementById('addBranchModal').classList.add('hidden');
        });

        document.getElementById('cancelCenter').addEventListener('click', () => {
            document.getElementById('addCenterModal').classList.add('hidden');
        });

        // Row Summey
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior
                const row = button.closest('tr');
                const secondColumn = document.getElementById('secondColumn');
                const firstColumn = document.getElementById('firstColumn');

                // Show second column
                secondColumn.classList.remove('hidden');
                firstColumn.classList.remove('lg:w-full');
                firstColumn.classList.add('lg:w-8/12');
                secondColumn.classList.add('lg:flex');

                // Update second column content
                const centerName = row.getAttribute('data-center-name');
                const manager = row.getAttribute('data-manager');
                const groups = row.getAttribute('data-groups');
                const members = row.getAttribute('data-members');
                const paymentDay = row.getAttribute('data-payment-day');

                document.getElementById('branchName').textContent = centerName;
                document.getElementById('Cname').textContent = centerName;
                document.getElementById('Cmanager').textContent = manager;
                document.getElementById('Tgroup').textContent = groups;
                document.getElementById('TMembers').textContent = members;
            });
        });
    </script>



</body>