@extends('layouts.mainLayout')

@section('content')

    <div class="flex h-screen w-screen bg-white">

        <div class="hidden sm:flex">

            <!-- Sidebar (Hidden on Mobile by Default) -->
            <aside id="sidebar" class="w-52 bg-gray-64 border-r transition-all duration-300 md:block ">
                <div class="p-4 flex flex-col justify-between h-full">
                    <!-- Sidebar Menu -->
                    <div class="pb-4 flex items-center justify-center">
                        <img src="{{ asset('assets/images/Logo.png') }}" alt="Company Logo" class="h-8 w-24 rounded-full full-logo">
                        <img src="{{ asset('assets/images/SmallLogo.png') }}" alt="Small Company Logo" class="h-8 w-8 rounded-full small-logo hidden">
                    </div>
                    <!-- Sidebar Navigation -->
                    <nav class="h-full overflow-hidden pt-0">
                        <ul class="space-y-2 content-start min-h-full  overflow-hidden text-xs">
                            <!-- Dashboard -->
                            <li >
                                <a href="#" class="flex items-center p-2 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2 active:bg-gray-200">
                                    <img src="{{ asset('assets/icons/DiamondsFour.svg') }}" alt="Dashboard Icon" class="h-4 w-4 ">
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>
                            <!-- Branches (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-2 px-4 w-full rounded-lg hover:bg-gray-100 active:bg-gray-200 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/Users.svg') }}" alt="Branches Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Branches</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Branches -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-white w-44">
                                    <li>
                                        <a href="#" class="flex items-center justify-start p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/MapPinLine.svg') }}" alt="Centers Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Centers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Members Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Members</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/Timer.svg') }}" alt="Recently Added Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Recently Added</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/IdentificationBadge.svg') }}" alt="Centers Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Member Summery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Income (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-2 px-4 w-full rounded-lg hover:bg-gray-100 active:bg-gray-200 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/CurrencyDollar.svg') }}" alt="Income Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Income</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Income -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-white w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/ChartLineUp.svg') }}" alt="Income Report Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Income Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/CurrencyCircleDollar.svg') }}" alt="Collections Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Collections</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/pay01.svg') }}" alt="Under Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Under Payments Added</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Payments (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-2 px-4 w-full rounded-lg hover:bg-gray-100 active:bg-gray-200 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/Money.svg') }}" alt="Payments Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Payments</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Payments -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-white w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/HourglassHigh.svg') }}" alt="Pending Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Pending</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/MinusCircle.svg') }}" alt="No Paid Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">No Paid</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Reports (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-2 px-4 w-full rounded-lg hover:bg-gray-100 active:bg-gray-200 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/IdentificationCard.svg') }}" alt="Reports Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Reports</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Reports -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-white w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/ChartBarHorizontal.svg') }}" alt="Lone Issue Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Lone Issue</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/ChartLineUp.svg') }}" alt="Income Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Income</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/HourglassHigh.svg') }}" alt="Pending Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Pending Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/Lockers.svg') }}" alt="Center Managers Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Center Managers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/UserGear.svg') }}" alt="Member Managers Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Member Managers</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Settings (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-2 px-4 w-full rounded-lg hover:bg-gray-100 active:bg-gray-200 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/GearSix.svg') }}" alt="Settings Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Settings</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Settings -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-white w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/UserSwitch.svg') }}" alt="User Account Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">User Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/GearSix.svg') }}" alt="Settings Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100 active:bg-gray-200">
                                            <img src="{{ asset('assets/icons/UserList.svg') }}" alt="User Logs Icon" class="h-4 w-4">
                                            <span class="sidebar-text-mini">User Logs</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- User Avatar -->
                    <div class="h-12 px-2 content-end sidebar-toggle">
                        <div class="flex items-center space-x-2 border border-blue-300 rounded-full text-small username ">
                            <img src="{{ asset('icons/Users.png') }}" alt="User Avatar" class=" h-6 w-6 rounded-full bg-blue-800 border border-blue-300">
                            <span class="text-xs sidebar-text">Dunura Hansaja</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>

        <div class="h-full w-full">

            <!-- Topbar -->
            <header class="bg-gray-200 border-b p-4 flex justify-between items-center sm:p-4 sm:space-x-4 sm:bg-white">
                <!-- Hamburger Menu Icon(Mobile) -->
                <button id="mobileMenuButton" class="sm:hidden text-gray-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <!-- Logo -->
                <div class="text-xl font-bold hidden">Company Name</div>

                <!--  Icon -->
                <button id="sidebarToggleButton" class="text-gray-600 pr-8 hidden sm:block">
                    <img src="{{ asset('assets/icons/Sidebar.svg') }}" alt="Sidebar Icon" class="h-5 w-5">
                </button>

                <!-- Search Bar -->
                <div class="hidden sm:flex flex-1 mx-4 text-xs">
                    <div class="relative w-11/12 "> 
                        <input type="text" placeholder="Search..." class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500  bg-gray-50">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-600 pr-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2.828-4.828A7.962 7.962 0 0018 10a8 8 0 10-8 8c1.657 0 3.175-.51 4.414-1.414l4.586 4.586z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Notifications and User -->
                <div class="flex items-center space-x-4 sm:space-x-6 pr-4 ">
                    <!-- Notifications Icon -->
                    <button class="text-gray-600 hidden sm:block">
                        <img src="{{ asset('assets/icons/ClockCounterClockwise.svg') }}" alt="Sidebar Icon" class="h-5 w-5">
                    </button>
                    <!-- Notifications Icon -->
                    <button class="text-gray-600">
                        <img src="{{ asset('assets/icons/Bell.svg') }}" alt="Sidebar Icon" class="h-5 w-5">
                    </button>
                    <!-- User Avatar -->
                    <div class="flex items-center space-x-2 sm:hidden">
                        <img src="{{ asset('images/user.png') }}" alt="User Avatar" class="h-7 w-7 rounded-full bg-blue-900">
                        <span class="hidden">Dunura Hansaja</span>
                    </div>
                </div>
            </header>
            
            <!-- Mobile Dropdown (Hidden by Default) -->
            <div id="mobileSidebar" class="absolute max-h-fit top-16 bottom-5 mac-h-1/2 w-60 inset-0 shadow md:hidden hidden ml-4 mt-2 rounded-xl bg-gray-200">
                <div class="p-4">
                    <div class="flex justify-between items-center mb-4 ">
                        <div class="text-xl font-bold ">Company Name</div>
                        <button id="closeMobileMenu" class="text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <nav class="  ">
                        <ul class="space-y-1 min-h-full  overflow-y-scroll  scrollbar-hide scroll-smooth">

                            <!-- Dashboard -->
                            <li >
                                <a href="#" class="flex items-center p-1 px-4 w-full rounded-lg hover:bg-gray-50 sidebar-toggle space-x-2">
                                    <img src="{{ asset('assets/icons/DiamondsFour.svg') }}" alt="Dashboard Icon" class="h-4 w-4 ">
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>
                            <!-- Branches (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-1 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/Users.svg') }}" alt="Branches Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Branches</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Branches -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-gray-200 w-44">
                                    <li>
                                        <a href="#" class="flex items-center justify-start p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/MapPinLine.svg') }}" alt="Centers Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Centers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-start p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/Users.svg') }}" alt="Members Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Members</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-start p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/Timer.svg') }}" alt="Recently Added Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Recently Added</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center justify-start p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/IdentificationBadge.svg') }}" alt="Centers Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Member Summery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Income (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-1 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/CurrencyDollar.svg') }}" alt="Income Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Income</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Income -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-gray-200 w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/ChartLineUp.svg') }}" alt="Income Report Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Income Report</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/CurrencyCircleDollar.svg') }}" alt="Collections Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Collections</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/pay01.svg') }}" alt="Under Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Under Payments Added</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Payments (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-1 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/Money.svg') }}" alt="Payments Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Payments</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Payments -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-gray-200 w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/Money.svg') }}" alt="Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/HourglassHigh.svg') }}" alt="Pending Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Pending</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/MinusCircle.svg') }}" alt="No Paid Icon" class="h-4 w-4">
                                            <span class="sidebar-text">No Paid</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Reports (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-1 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/IdentificationCard.svg') }}" alt="Reports Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Reports</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Reports -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-gray-200 w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/ChartBarHorizontal.svg') }}" alt="Lone Issue Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Lone Issue</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/ChartLineUp.svg') }}" alt="Income Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Income</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/HourglassHigh.svg') }}" alt="Pending Payments Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Pending Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/Lockers.svg') }}" alt="Center Managers Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Center Managers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/UserGear.svg') }}" alt="Member Managers Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Member Managers</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Settings (with Submenu) -->
                            <li>
                                <button class="flex items-center justify-between p-1 px-4 w-full rounded-lg hover:bg-gray-100 sidebar-toggle space-x-2">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ asset('assets/icons/GearSix.svg') }}" alt="Settings Icon" class="h-4 w-4">
                                        <span class="sidebar-text">Settings</span>
                                    </div>
                                    <svg class="w-4 h-4 transform transition-transform duration-200 arrow sidebar-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Submenu for Settings -->
                                <ul class="space-y-2 submenu hidden pl-4 mt-2 bg-gray-200 w-44">
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/UserSwitch.svg') }}" alt="User Account Icon" class="h-4 w-4">
                                            <span class="sidebar-text">User Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/GearSix.svg') }}" alt="Settings Icon" class="h-4 w-4">
                                            <span class="sidebar-text">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-1 px-4 rounded-md space-x-2 hover:bg-gray-100">
                                            <img src="{{ asset('assets/icons/UserList.svg') }}" alt="User Logs Icon" class="h-4 w-4">
                                            <span class="sidebar-text">User Logs</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>

            <!----------------------------------------------------------------------------------------------------------->
            <!-- Main Content -->
            <main class="flex-1 p-6">
               1212111111111111111111111111111
            </main>     

        </div>
    </div>

        <style>
        /* Logo toggle */
        #sidebar.w-20 .full-logo {
            display: none;
        }
        #sidebar.w-20 .small-logo {
            display: block;
        }
        #sidebar .full-logo {
            display: block;
        }
        #sidebar .small-logo {
            display: none;
        }
        
        /* Hide text and arrows in small sidebar */
        #sidebar.w-20 .sidebar-text,
        #sidebar.w-20 .sidebar-arrow {
            display: none;
        }

        /* Center icons in small sidebar */
        #sidebar.w-20 .flex.items-center {
            justify-content: center;
        }

        /* Ensure submenu is visible and styled for both sidebar sizes */
        #sidebar .submenu {
            left: 100%;
            top: 0;
            z-index: 10;
        }
        #sidebar.w-20 .submenu {
            position: absolute;
            left: 100%;
            top: 0;
            z-index: 100;
            width: 11rem; /* w-44 */
        }      

        #sidebar.w-20 .submenu {
            left: 4rem; /* Adjust based on small sidebar width */
        }
        
        #sidebar.w-20 .username {
            border: none; /* Adjust based on small sidebar width */
        }
            /* Active state styling */
        .active {
            background-color: #e5e7eb !important; /* gray-200 */
            font-weight: 600;
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
            </script>


@endsection