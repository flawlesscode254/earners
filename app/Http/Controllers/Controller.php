<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public $activationFee = 1000;

    public $referralBonus = 300;

    public $adminPayment = 400;


    public $level1Payment = 300;
    public $level2Payment = 700;
    public $level3Payment = 1000;
    public $level4Payment = 2000;
    public $level5Payment = 3000;
    public $level6Payment = 4000;



}
