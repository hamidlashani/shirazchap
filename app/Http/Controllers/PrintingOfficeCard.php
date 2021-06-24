<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\printingofficelargeformatorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class PrintingOfficeCard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




}
