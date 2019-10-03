<?php

namespace App\Http\Controllers\Reporting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function branchAndPeriodWiseReport()
    {

        $data = [
            'title'=>'Bank Branch & Period Wise Report',
        ];
    	return view('reports.bank-branch-and-period-wise-report-search', $data);
    }

    public function dateWiseReportMaturity()
    {

        $data = [
            'title'=>'Date Wise FDR Report/Maturity',
        ];
    	return view('reports.date-wise-fdr-report-maturity-search', $data);
    }
}
