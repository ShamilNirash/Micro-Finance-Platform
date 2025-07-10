<?php

namespace App\Http\Controllers;

use App\Repositories\LoanRepository;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanRepository;

    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }
    public function createLoan(Request $request)
    {
        dd($request);
    }
}
