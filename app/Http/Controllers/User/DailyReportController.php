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
        $dailyreports = $this->dailyreport::all();
        return view('user.daily_report.index', compact('dailyreports'));
    }

    public function show($id)
    {
        $dailyreport = $this->dailyreport::find($id);
        return view('user.daily_report.show',compact('dailyreport'));
    }

    public function update(Request $request, $id)
    {
        $dailyreport = $this->dailyreport::find($id);
        $dailyreport -> title = $request -> input('title');
        $dailyreport -> contents = $request -> input('contents');
        return redirect() -> route('dailyreport.show',['id' => $request ->id]);
    }

    public function create()
    {
        $dailyreport = new DailyReport();
        $dailyreport -> title = $request -> input('title');
        $dailyreport -> contents = $request -> input('contents');
        return redirect() -> route('dailyreport.show',['id' => $request ->id]);
    }

    public function destroy($id)
    {
        $dailyreport = $this->dairyreport::find::($id);
        $dailyreport->delete();
    }

}
