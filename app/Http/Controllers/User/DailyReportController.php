<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\DailyReportRequest;

class DailyReportController extends Controller
{
    protected $dailyreport;

    public function __construct(DailyReport $dailyreport)
    {
        $this->middleware('auth');
        $this->dailyreport = $dailyreport;
    }

    public function index(Request $request)
    {
        if ($request->filled('search_month')) {
            $search_date_min = $request->search_month."-01";
            $search_date_max = $request->search_month."-31";
            $dailyreports = $this->dailyreport::orderby('reporting_time','desc')
                ->whereBetween('reporting_time', [$search_date_min, $search_date_max])->get();
        } else {
            $dailyreports = $this->dailyreport::orderby('reporting_time','desc')->get();
        }
        return view('user.daily_report.index', compact('dailyreports'));
    }

    public function create()
    {
        return view('user.daily_report.create');
    }

    public function show($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        return view('user.daily_report.show', compact('dailyreport'));
    }

    public function store(DailyReportRequest $request)
    {
        $input = $request->all();
        $this->dailyreport->fill($input)->save();
        return redirect()->route('dailyreport.index');
    }

    public function edit($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        return view('user.daily_report.edit', compact('dailyreport'));
    }

    public function update(DailyReportRequest $request, $id)
    {
        $input = $request->all();
        $this->dailyreport::find($id)->fill($input)->save();
        return redirect()->route('dailyreport.index');
    }

    
    
    public function destroy($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        $dailyreport->delete();
        return redirect()->route('dailyreport.index');
    }

}

