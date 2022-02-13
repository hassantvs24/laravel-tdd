<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function dashboard($country)
    {
        $table = Logs::select(DB::raw('DATE(ended_at_date) as date'), DB::raw('count(*) as views'))
            ->whereJsonContains('params->geolocation->display', $country)
            ->groupBy('date')
            ->get();

        //$data = [];
        foreach ($table as $row){
            $rowData[$row->date] = $row->views;
            //$data[] = $rowData;
        }

        dd($rowData);
        //return data into view
    }
}
