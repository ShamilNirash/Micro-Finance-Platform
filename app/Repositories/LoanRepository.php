<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for users
 *
 *
 *
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Loan;
use Exception;
use Illuminate\Validation\ValidationException;

class LoanRepository
{
    protected $loans;

    public function __construct(Loan $loans)
    {
        $this->loans = $loans;
    }

    public function create($center)
    {
        try {
            return $this->loans->create($center);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function search_one($type, $value)
    {
        try {
            return $this->loans->where([$type => $value, 'status' => 'ACTIVE'])->first();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function search_many($type, $value)
    {
        try {
            return $this->loans->where([$type => $value, 'status' => 'ACTIVE'])->get();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function get_all()
    {
        try {
            return $this->loans->where(['status' => 'ACTIVE'])->get();
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function update($id, $type, $value)
    {
        try {
            return $this->search_one('id', $id)->update([$type => $value]);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
