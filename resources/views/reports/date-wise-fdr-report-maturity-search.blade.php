@extends('master.master')

@section('maincontent')
	<div class="content-container container-fluid">
        <div class="page-heading">
            <h1 class="heading-title">Date Wise FDR Report/Maturity</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-header-nobg-bb mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Report Pane</h6>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_ledger_details" name="radio_report_pane" class="custom-control-input">
                            <label class="custom-control-label" for="radio_ledger_details">Terms Basis FDR Report</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_ledger_summary" name="radio_report_pane" class="custom-control-input">
                            <label class="custom-control-label" for="radio_ledger_summary">Term Basis FDR Report (Summary)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-header-nobg-bb mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Report Format</h6>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_report_pdf" name="radio_report_format" class="custom-control-input">
                            <label class="custom-control-label" for="radio_report_pdf">PDF</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_report_html" name="radio_report_format" class="custom-control-input">
                            <label class="custom-control-label" for="radio_report_html">HTML</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_report_excel" name="radio_report_format" class="custom-control-input">
                            <label class="custom-control-label" for="radio_report_excel">Excel</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_report_delimited_data" name="radio_report_format" class="custom-control-input">
                            <label class="custom-control-label" for="radio_report_delimited_data">Delimited Data</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="radio_report_xml" name="radio_report_format" class="custom-control-input">
                            <label class="custom-control-label" for="radio_report_xml">XML</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-header-nobg-bb mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Date/Time Choose</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div style="border-right: 1px solid #f1f1f1; padding-right: 15px">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_today" name="radio_dt_day" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_today">Today</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_lastday" name="radio_dt_day" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_lastday">Last Day</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="border-right: 1px solid #f1f1f1; padding-right: 15px">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_currentMonth" name="radio_dt_month" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_currentMonth">Current Month</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_lastMonth" name="radio_dt_month" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_lastMonth">Last Month</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_date-range" name="radio_dt_year" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_date-range">Date Range</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="radio_dt_lastyear" name="radio_dt_year" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_dt_lastyear">Last Year</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="card card-header-nobg-bb mb-3">
            <div class="card-header">
                <h6 class="mb-0">Parameter Pane</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="form-group row">
                                <label for="label_bankName" class="col-sm-2 col-form-label">FDR Type</label>
                                <div class="col-sm-5">
                                    <select name="" id="" class="custom-select">
                                        <option value="Select any Type">Select any Type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="label_bankName" class="col-sm-2 col-form-label">Institute Type</label>
                                <div class="col-sm-5">
                                    <select name="" id="" class="custom-select">
                                        <option value="">Bank/NBFI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Data</label>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div>
                                            <input type="text" class="form-control" value="1086">
                                        </div>
                                        <div class="d-flex align-items-center px-2">
                                            To
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" value="6347">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="label_bankName" class="col-sm-2 col-form-label">Bank Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="label_bankName" class="col-sm-2 col-form-label">Branch Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="label_bankName" class="col-sm-2 col-form-label">GDIC Branch Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right">
            <a href="" class="btn btn-custom-outline-light mr-2">Back</a>
            <a href="" class="btn btn-custom-primary">View Report</a>
        </div>
    </div>
@endsection