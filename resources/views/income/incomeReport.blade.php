@extends('layouts.layout')
@php
    use Carbon\Carbon;
    require_once resource_path('libs\first_letter_capitalization.php');
    require_once resource_path('libs\every_word_first_letter_capitalization.php');
@endphp
@section('contents')
    <div id="mainContent" class="flex lg:h-full">
        <!--Mobile Cards and table View-->

        <div id="firstColumn" class="w-full h-full p-2 lg:border-r lg:p-4 transition-all duration-300  lg:relative lg:py-4  ">
            <!---Cards-->
            <!--<div class="flex w-full lg:h-1/6">

                                                                            <div id="topCards" class="grid grid-cols-1 lg:flex gap-2 lg:gap-08 w-full p-2 lg:p-0 lg:py- lg:pb-4">

                                                                                <div id="totalLoan" class="bg-gray-100 px-4 py-2 lg:py-1 rounded-lg shadow-sm flex justify-between items-center w-full border" data-branch="balangoda">
                                                                                    <div class="flex flex-col w-1/2 ">
                                                                                        <h2 class="text-sm font-semibold text-gray-600">Total Loan</h2>
                                                                                        <p class="text-sm text-gray-400">Balangoda</p>
                                                                                    </div>
                                                                                    <div class="flex flex-col justify-items-end items-end  w-1/2">
                                                                                        <h1 class="text-xl md:text-lg  font-semibold text-right text-gray-600">05</h1>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="totalResived" class="bg-gray-100 px-4 py-2 lg:py-2 rounded-lg shadow-sm flex justify-between items-center w-full border" data-branch="balangoda">
                                                                                    <div class="flex flex-col  w-1/2 ">
                                                                                        <h2 class="text-sm font-semibold text-gray-600 ">Total Resived</h2>
                                                                                        <p class="text-xs text-gray-400 ">Balangoda</p>
                                                                                    </div>
                                                                                    <div class="flex flex-col justify-items-end items-end  w-1/2">
                                                                                        <h1 class="text-xl md:text-lg font-semibold text-right text-gray-600">12000000/=</h1>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="totalIncome" class="bg-gray-100 px-4 py-2 lg:py-1 rounded-lg shadow-sm flex justify-between items-center w-full border" data-branch="ella">
                                                                                    <div class="flex flex-col w-1/2 ">
                                                                                        <h2 class="text-sm font-semibold text-gray-600">Total Income</h2>
                                                                                        <p class="text-sm text-gray-400">Ella</p>
                                                                                    </div>
                                                                                    <div class="flex flex-col justify-items-end items-end  w-1/2">
                                                                                        <h1 class="text-xl md:text-lg font-semibold text-right text-gray-600">180000/=</h1>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>-->

            <!--Start Table and Card Vies-->
            <div class="p-0 border-0 lg:py-2 lg:bg-sky-50 lg:border rounded-lg flex flex-col justify-between lg:h-full">
                <!--lg:h-5/6-->
                <!-- Top Bar - Seach bar and filter option for both mobile and web -->
                <div
                    class="flex flex-col w-full space-y-2 p-2 lg:px-2 text-md lg:flex lg:flex-row lg:space-y-0 lg:justify-between lg:items-center lg:p-1">
                    <!-- filter line -->
                    <div id="filterRow"
                        class="flex flex-col lg:flex-row w-full  justify-start lg:space-x-2 space-y-2 lg:space-y-0 lg:w-1/2">
                        <!-- Filter Button -->
                        <div class=" text-sm lg:w-max  lg:space-x-2">
                            <button value=""
                                class="hidden lg:flex bg-white p-2 rounded-lg focus:outline-none border w-8">
                                <img src="{{ asset('assets/icons/Funnel.svg') }}" alt="Dashboard Icon" class="h-4 w-4">
                            </button>
                        </div>
                        <!--Branch Filter-->
                        <div class="w-full lg:w-1/2">
                            <div class="w-full lg:mb-0 relative text-sm">
                                <select id="branchSelect" name="branch"
                                    class="w-full absolute p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none hidden text-sm lg:text-xs"
                                    onchange="filterData()">
                                    <option class="text-sm" value="">Select Branch</option>
                                    @foreach ($all_active_branches as $branch_name)
                                        <option value={{ $branch_name->branch_name }}>
                                            {{ capitalizeFirstLetter($branch_name->branch_name) }}</option>
                                    @endforeach
                                </select>
                                <!-- Custom dropdown trigger -->
                                <div id="dropdownTriggerBranch"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white cursor-pointer flex items-center justify-between lg:text-xs"
                                    onclick="toggleDropdownBranch()">
                                    <span id="selectedOptionBranch">Select Branch</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <!-- Custom dropdown menu -->
                                <div id="dropdownMenuBranch"
                                    class="hidden absolute z-10 w-full bg-white border rounded-lg mt-1 shadow-lg lg:text-xs">
                                    <ul class="py-1 px-8 lg:px-4 lg:text-xs">
                                        @foreach ($all_active_branches as $branch_name)
                                            <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                                data-value={{ $branch_name->branch_name }}>
                                                {{ capitalizeFirstLetter($branch_name->branch_name) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Center Fliter-->
                        <div class="w-full lg:w-1/2 flex lg:pr-2">
                            <div class="w-full lg:mb-0 relative text-sm">
                                <select id="centerSelect" name="branch"
                                    class="w-full absolute p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none hidden text-sm lg:text-xs"
                                    onchange="filterData()">
                                    <option class="text-sm" value="">Select Center</option>
                                    <option value="Ella Center 01">Ella Center 01</option>
                                    <option value="Center 02">Center 02</option>
                                    <option value="Center 03">Center 03</option>
                                    <option value="Center 04">Center 04</option>
                                </select>
                                <!-- Custom dropdown trigger -->
                                <div id="dropdownTriggerCenter"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white cursor-pointer flex items-center justify-between lg:text-xs"
                                    onclick="toggleDropdownCenter()">
                                    <span id="selectedOptionCenter">Select Center</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <!-- Custom dropdown menu -->
                                <div id="dropdownMenuCenter"
                                    class="hidden absolute z-10 w-full bg-white border rounded-lg mt-1 shadow-lg lg:text-xs">
                                    <ul class="py-1 px-8 lg:px-4 lg:text-xs">
                                        <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                            data-value="Ella Center 01" onclick="selectCenter('Ella Center 01')">Ella
                                            Center 01</li>
                                        <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                            data-value="Center 02" onclick="selectCenter('Center 02')">Center 02</li>
                                        <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                            data-value="Center 03" onclick="selectCenter('Center 03')">Center 03</li>
                                        <li class="px-4 py-2 text-sm text-center hover:bg-gray-100 cursor-pointer border-b lg:text-xs"
                                            data-value="Center 04" onclick="selectCenter('Center 04')">Center 04</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Date filter -->
                    <form method="GET" id="filterForm" class="w-full">
                        <div id="dateFilter"
                            class="flex flex-col lg:flex-row w-full justify-end lg:space-x-2 space-y-2 lg:space-y-0 lg:w-1/2">
                            <div
                                class="w-full lg:w-1/2 p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white flex items-center justify-between text-sm lg:text-xs">
                                <label for="startDate" class="m-1">Start Date</label>
                                <input type="date" name="startDate" id="startDate" value="{{ request('startDate') }}"
                                    onchange="document.getElementById('filterForm').submit();">
                            </div>
                            <div
                                class="w-full lg:w-1/2 p-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white flex items-center justify-between text-sm lg:text-xs">
                                <label for="endDate" class="m-1">End Date</label>
                                <input type="date" name="endDate" id="endDate" value="{{ request('endDate') }}"
                                    onchange="document.getElementById('filterForm').submit();">
                            </div>
                        </div>
                    </form>

                </div>
                <!--End Top Bar-->

                <!-------------CARD------------------------------------------------------------------------------------------------------------>
                <!-- Centers Grid card format hidden for lg screens -->
                <div id="centersGrid" class="grid grid-cols-1 sm:grid-cols-1 lg:hidden gap-4 p-2">
                    <!-- Card for a center -->
                    <div class="rounded-md shadow flex flex-col justify-between w-full bg-blue-200 hover:bg-blue-300"
                        data-center="Malwaragoda" data-branch="balangoda">
                        <div class="h-12 flex flex-col items-center justify-center bg-blue-100  rounded-t-md">
                            <p class=" text-sm font-bold text-gray-800">Center Name</p>
                            <div class="text-xs flex items-center space-x-1 ">
                                <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                <p class="text-gray-700">Dunura Rubasinghe</p>
                            </div>
                        </div>
                        <div class="h-max py-2 px-4 flex flex-col justify-between space-y-1">
                            <div class="grid grid-cols-2 w-full">
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Groups Count :</p>
                                    <p class="text-gray-700">05</p>
                                </div>
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Total Loans :</p>
                                    <p class="text-gray-700">10</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 w-full">
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">To Recived :</p>
                                    <p class="text-gray-700">05</p>
                                </div>
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Today Income :</p>
                                    <p class="text-gray-700">10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sample for a center -->
                    <div class="rounded-md shadow flex flex-col justify-between w-full bg-blue-200 hover:bg-blue-200"
                        data-center="Ella Center" data-branch="ella">
                        <div class="h-12 flex flex-col items-center justify-center bg-blue-100  rounded-t-md">
                            <p class=" text-sm font-bold text-gray-800">Ella Center</p>
                            <div class="text-xs flex items-center space-x-1 ">
                                <img src="{{ asset('assets/icons/Users.svg') }}" alt="Dashboard Icon" class="h-3 w-3">
                                <p class="text-gray-700">Saman Perera</p>
                            </div>
                        </div>
                        <div class="h-max py-2 px-4 flex flex-col justify-between space-y-1">
                            <div class="grid grid-cols-2 w-full">
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Groups Count :</p>
                                    <p class="text-gray-700">03</p>
                                </div>
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Total Loans :</p>
                                    <p class="text-gray-700">08</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 w-full">
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">To Recived :</p>
                                    <p class="text-gray-700">03</p>
                                </div>
                                <div class="text-xs flex items-center space-x-1 ">
                                    <p class="">Today Income :</p>
                                    <p class="text-gray-700">15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------TABLE------------------------------------------------------------------------------------------------------------>
                <!-- Centers Grid Table format hidden for mobile screens -->
                <div class="flex justify-start h-full pt-2">
                    <div id="centersGridTable"
                        class="w-full max-h-[calc(70vh-180px)]  hidden lg:block p-0 overflow-y-auto border-t">
                        <div class="min-w-full h-full">
                            <table class="w-full min-w-max">
                                <thead class="w-full text-gray-700 text-xs font-light bg-gray-200 sticky top-0">
                                    <tr class="uppercase w-full">
                                        <th class="pl-2 text-left">
                                            <input type="checkbox" id="select-all"
                                                class="form-checkbox h-4 w-4 text-blue-400 m-1">
                                        </th>
                                        <th class="py-2 px-2 text-left">#</th>
                                        <th class="py-2 text-left">Center Name</th>
                                        <th class="py-2 text-left">Groups</th>
                                        <th class="py-2 text-left">Center Manager</th>
                                        <th class="py-2 text-left">Total Loans</th>
                                        <th class="py-2 text-left">Received</th>
                                        <th class="py-2 text-left">No Paid</th>
                                        <th class="py-2 text-left">Total Income</th>
                                        <th class="py-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody" class="text-gray-800 text-xs font-light bg-white">
                                    @foreach ($all_active_centers as $center)
                                        <tr class="border-b border-gray-200 hover:bg-sky-100 cursor-pointer rounded-lg  view-details"
                                            data-center-id="1" data-branch-name="Balangoda"
                                            data-center-name="Malwaragoda" data-manager="John Doe" data-loan-count="4"
                                            data-to-recive="2000" data-today-income="1000000" data-date="2025-06-01">
                                            <td class="pl-2 text-left">
                                                <input type="checkbox" name="selected_ids[]" value="1"
                                                    class="form-checkbox h-4 w-4 text-blue-600 m-1">
                                            </td>
                                            <td class="py-2 text-left">{{ str_pad($center->id, 3, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <td class="py-2 text-left">{{ capitalizeFirstLetter($center->center_name) }}
                                            </td>
                                            <td class="py-2 text-left">
                                                {{ str_pad($center->group->count(), 2, '0', STR_PAD_LEFT) }}</td>
                                            <td class="py-2 text-left">{{ capitalizeEachWord($center->manager_name) }}
                                            </td>
                                            @php

                                                $filterStartDate = request()->startDate
                                                    ? \Carbon\Carbon::parse(request()->startDate)
                                                    : null;
                                                $filterEndDate = request()->endDate
                                                    ? \Carbon\Carbon::parse(request()->endDate)
                                                    : null;
                                                $totalActiveLoans = $center->group->sum(function ($group) use (
                                                    $filterStartDate,
                                                    $filterEndDate,
                                                ) {
                                                    return $group->member->sum(function ($member) use (
                                                        $filterStartDate,
                                                        $filterEndDate,
                                                    ) {
                                                        return $member->loan
                                                            ->filter(function ($loan) use (
                                                                $filterStartDate,
                                                                $filterEndDate,
                                                            ) {
                                                                /* if ($loan->status !== 'UNCOMPLETED') {
                                                                    return false;
                                                                } */

                                                                // Loop through all installments of the loan
                                                                foreach ($loan->installment as $installment) {
                                                                    // 1. Check underpayments for this installment
                                                                    foreach (
                                                                        $installment->underpayment
                                                                        as $underpayment
                                                                    ) {
                                                                        $underPayedDate = Carbon::parse(
                                                                            $underpayment->payed_date,
                                                                        );
                                                                        if (
                                                                            (!$filterStartDate ||
                                                                                $underPayedDate >= $filterStartDate) &&
                                                                            (!$filterEndDate ||
                                                                                $underPayedDate <= $filterEndDate)
                                                                        ) {
                                                                            return true;
                                                                        }
                                                                    }
                                                                    $installmentPayedDate = Carbon::parse(
                                                                        $installment->payed_date,
                                                                    );
                                                                    if (
                                                                        (!$filterStartDate ||
                                                                            $installmentPayedDate >=
                                                                                $filterStartDate) &&
                                                                        (!$filterEndDate ||
                                                                            $installmentPayedDate <= $filterEndDate)
                                                                    ) {
                                                                        return true;
                                                                    }
                                                                }

                                                                return false; // No conditions met
                                                            })
                                                            ->count(); // Count each loan only once
                                                    });
                                                });

                                                $totalReceived = $center->group->sum(function ($group) use (
                                                    $filterStartDate,
                                                    $filterEndDate,
                                                ) {
                                                    return $group->member->sum(function ($member) use (
                                                        $filterStartDate,
                                                        $filterEndDate,
                                                    ) {
                                                        return $member->loan->sum(function ($loan) use (
                                                            $filterStartDate,
                                                            $filterEndDate,
                                                        ) {
                                                            return $loan->installment->sum(function ($installment) use (
                                                                $filterStartDate,
                                                                $filterEndDate,
                                                            ) {
                                                                // If installment has underpayments
                                                                if (
                                                                    $installment->underpayment &&
                                                                    $installment->underpayment->isNotEmpty()
                                                                ) {
                                                                    return $installment->underpayment
                                                                        ->filter(function ($underpayment) use (
                                                                            $filterStartDate,
                                                                            $filterEndDate,
                                                                        ) {
                                                                            $payedDate = Carbon::parse(
                                                                                $underpayment->payed_date,
                                                                            );
                                                                            return (!$filterStartDate ||
                                                                                $payedDate >= $filterStartDate) &&
                                                                                (!$filterEndDate ||
                                                                                    $payedDate <= $filterEndDate);
                                                                        })
                                                                        ->sum('amount'); // Sum filtered underpayments
                                                                }

                                                                $payedDate = Carbon::parse($installment->payed_date);
                                                                if (
                                                                    (!$filterStartDate ||
                                                                        $payedDate >= $filterStartDate) &&
                                                                    (!$filterEndDate || $payedDate <= $filterEndDate)
                                                                ) {
                                                                    return $installment->amount;
                                                                }

                                                                return 0; // No match
                                                            });
                                                        });
                                                    });
                                                });

                                                $totalIncome = $center->group->sum(function ($group) use (
                                                    $filterStartDate,
                                                    $filterEndDate,
                                                ) {
                                                    return $group->member->sum(function ($member) use (
                                                        $filterStartDate,
                                                        $filterEndDate,
                                                    ) {
                                                        return $member->loan->sum(function ($loan) use (
                                                            $filterStartDate,
                                                            $filterEndDate,
                                                        ) {
                                                            return $loan->installment
                                                                ->filter(function ($installment) use (
                                                                    $filterStartDate,
                                                                    $filterEndDate,
                                                                ) {
                                                                    $date = Carbon::parse($installment->date_and_time);
                                                                    return (!$filterStartDate ||
                                                                        $date >= $filterStartDate) &&
                                                                        (!$filterEndDate || $date <= $filterEndDate);
                                                                })
                                                                ->sum('installment_amount');
                                                        });
                                                    });
                                                });

                                                $noPaid = $totalIncome - $totalReceived;
                                            @endphp
                                            <td class="py-2 text-left">
                                                {{ $totalActiveLoans }}
                                            </td>

                                            <td class="py-2 text-left">Rs. {{ number_format($totalReceived, 2) }}</td>
                                            <td class="py-2 text-left">Rs. {{ number_format($noPaid, 2) }}</td>
                                            <td class="py-2 text-left">Rs. {{ number_format($totalIncome, 2) }}</td>

                                            <td class="py-2 text-center flex justify-center items-center gap-1">
                                                <a href="#" class="border rounded hover:bg-green-500">
                                                    <img src="{{ asset('assets/icons/Eye.svg') }}" alt="Eye"
                                                        class="h-3 w-3 m-1">
                                                </a>
                                                <a href="#" class="border rounded hover:bg-sky-500">
                                                    <img src="{{ asset('assets/icons/ArrowLineDown.svg') }}"
                                                        alt="Pencil" class="h-3 w-3 m-1">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="hidden mt- mx-4 lg:flex justify-between items-center text-xs text-gray-500">
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

        <!-- Second Column: Side view of table view -->
        <div id="RowDetails" class="hidden h-full lg:w-4/12 flex-col transition-all duration-300 overflow-y-auto">
            <div id="RowDetailsContent" class="border-b p-4 h-2/8">
                <h1 id="branchName" class="text-md font-medium text-gray-800 mb-4">Branch Name</h1>
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
                        <p for="loanCount" class="text-xs text-gray-400">Loan Count</p>
                        <p id="loanCount" class="text-sm">-</p>
                    </div>
                    <div>
                        <p for="toRecive" class="text-xs text-gray-400">To Recived</p>
                        <p id="toRecive" class="text-sm mt-0">-</p>
                    </div>
                    <div>
                        <p for="todayIncome" class="text-xs text-gray-400">Today Income</p>
                        <p id="todayIncome" class="text-sm mt-0">-</p>
                    </div>
                </div>
            </div>
            <!--Group List-->
            <div id="" class=" p-4  overflow-auto h-5/8 max-h-[calc(100vh-320px)] space-y-2">
                <h1 id="branchName" class="text-md font-medium text-gray-800 mb-4">Group List</h1>
                <!--Card-->
                <div class="border bg-sky-50 flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">Today Income</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">Today Income</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">Today Income</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">Today Income</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">Today Income</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">end</p>
                </div>
                <!--Card-->
                <div class="border bg-sky-50  flex justify-between items-center p-2 px-4 rounded-lg">
                    <p class="text-xs font-bold text-gray-600">Group name</p>
                    <p class="text-xs font-medium text-gray-600">end</p>
                </div>
            </div>

            <!--Summer Button-->
            <div class="bg-white p-4 h-1/8 border-t">
                <div class="w-full text-sm lg:text-xs">
                    <button id="getGroupSummary" value=""
                        class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 focus:outline-none flex justify-center">
                        <img src="{{ asset('assets/icons/ArrowLineDownWhite.svg') }}" alt="Pencil"
                            class="h-3 w-3 m-1">
                        Get Center Summary
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //TABLE------------------------------------------------------------------------
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

        // DROPDOWN FOR FILTER-----------------------------------------------------------
        // Custom dropdown Branch
        function toggleDropdownBranch() {
            const dropdownMenu = document.getElementById('dropdownMenuBranch');
            dropdownMenu.classList.toggle('hidden');
        }

        function selectBranch(value) {
            const selectedOption = document.getElementById('selectedOptionBranch');
            selectedOption.textContent = value;
            document.getElementById('branchSelect').value = value;
            document.getElementById('dropdownMenuBranch').classList.add('hidden');
            filterData();
        }

        // Custom dropdown Centers
        function toggleDropdownCenter() {
            const dropdownMenu = document.getElementById('dropdownMenuCenter');
            dropdownMenu.classList.toggle('hidden');
        }

        function selectCenter(value) {
            const selectedOption = document.getElementById('selectedOptionCenter');
            selectedOption.textContent = value;
            document.getElementById('centerSelect').value = value;
            document.getElementById('dropdownMenuCenter').classList.add('hidden');
            filterData();
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = ['dropdownMenuBranch', 'dropdownMenuCenter'];
            const triggers = ['dropdownTriggerBranch', 'dropdownTriggerCenter'];
            dropdowns.forEach(dropdownId => {
                const dropdown = document.getElementById(dropdownId);
                const trigger = document.getElementById(triggers[dropdowns.indexOf(dropdownId)]);
                if (!trigger.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });

        // Filtering function
        function filterData() {
            const branchFilter = document.getElementById('branchSelect').value.toLowerCase();
            const centerFilter = document.getElementById('centerSelect').value.toLowerCase();
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            // Filter cards (mobile view)
            const cards = document.querySelectorAll('#centersGrid > div');
            cards.forEach(card => {
                const branch = card.getAttribute('data-branch').toLowerCase();
                const center = card.getAttribute('data-center').toLowerCase();
                const date = card.getAttribute('data-date') || '2025-01-01'; // Default date if not present

                let showCard = true;
                if (branchFilter && branch !== branchFilter) showCard = false;
                if (centerFilter && center !== centerFilter) showCard = false;
                if (startDate && new Date(date) < new Date(startDate)) showCard = false;
                if (endDate && new Date(date) > new Date(endDate)) showCard = false;

                card.style.display = showCard ? 'block' : 'none';
            });

            // Filter table rows (desktop view)
            const rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                const branch = row.getAttribute('data-branch-name').toLowerCase();
                const center = row.getAttribute('data-center-name').toLowerCase();
                const date = row.getAttribute('data-date');

                let showRow = true;
                if (branchFilter && branch !== branchFilter) showRow = false;
                if (centerFilter && center !== centerFilter) showRow = false;
                if (startDate && new Date(date) < new Date(startDate)) showRow = false;
                if (endDate && new Date(date) > new Date(endDate)) showRow = false;

                row.style.display = showRow ? 'table-row' : 'none';
            });
        }

        //SECOND COUMN------------------------------------------------------------
        // Helper function to hide all second columns
        function hideAllSecondColumns() {
            const columns = ['RowDetails'];
            columns.forEach(col => document.getElementById(col).classList.add('hidden'));

            document.getElementById('firstColumn').classList.remove('lg:w-8/12');
            document.getElementById('firstColumn').classList.add('lg:w-full');
        }

        // Row Summary Details
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const row = button.closest('tr');
                const RowDetails = document.getElementById('RowDetails');
                const firstColumn = document.getElementById('firstColumn');

                RowDetails.classList.remove('hidden');
                firstColumn.classList.remove('lg:w-full');
                firstColumn.classList.add('lg:w-8/12');
                RowDetails.classList.add('lg:flex');
                totalLoan.classList.add('lg:hidden');
                topCards.classList.add('lg:grid-cols-2');
                dateFilter.classList.add('lg:hidden');
                filterRow.classList.remove('lg:w-1/2');

                const branchName = row.getAttribute('data-branch-name');
                const centerName = row.getAttribute('data-center-name');
                const manager = row.getAttribute('data-manager');
                const loanCount = row.getAttribute('data-loan-count');
                const toRecive = row.getAttribute('data-to-recive');
                const todayIncome = row.getAttribute('data-today-income');

                document.getElementById('branchName').textContent = branchName;
                document.getElementById('Cname').textContent = centerName;
                document.getElementById('Cmanager').textContent = manager;
                document.getElementById('loanCount').textContent = loanCount;
                document.getElementById('toRecive').textContent = toRecive;
                document.getElementById('todayIncome').textContent = todayIncome;
            });
        });
    </script>
@endsection
