<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    protected $dailyreport;

    public function __construct(DailyReport $dailyreport)
    {
        $this->dailyreport = $dailyreport;
    }

    public function index()
    {
        return view('user.daily_report.index');
    }

}
