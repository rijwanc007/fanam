<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Company;
use App\Employee;
use App\Incentive;
use App\Project;
use App\Sell;
use App\SisCon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::all();
        $employees = Employee::all();
        $companies = Company::all();
        $siscompanies = SisCon::all();
        $collections = Collection::all();
        $incentives = Incentive::all();
        $sells = Sell::all();
        return view('home', compact('projects','companies','employees', 'collections','siscompanies', 'incentives', 'sells'));
    }
}
