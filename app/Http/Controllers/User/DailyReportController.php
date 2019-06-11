<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{
    protected $dailyreport;

    public function __construct(DailyReport $dailyreport)
    {
        $this->middleware('auth');
        $this->dailyreport = $dailyreport;
    }

    public function index()
    {
        $userId = Auth::id();
        $dailyreports = $this->dailyreport::all();
        return view('user.daily_report.index', compact('dailyreports'));
    }

    public function create()
    {
        return view('user.daily_report.create');
    }

    public function show($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        return view('user.daily_report.show',compact('dailyreport'));
    }

    public function store(Request $request)
    {
        /*
        $dailyreport = new DailyReport();
        $dailyreport -> title = $request -> input('title');
        $dailyreport -> contents = $request -> input('contents');
        $dailyreport -> save();
        */
        return redirect()->route('dailyreport.index');
    }

    public function edit($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        return view('user.daily_report.edit', compact('dailyreport'));
    }

    public function update(Request $request, $id)
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
