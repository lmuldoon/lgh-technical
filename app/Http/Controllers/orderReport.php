<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\orderData;
use Carbon\Carbon;

class orderReport extends Controller
{
    public function chartData()
    {
        $threeWeeksAgo = Carbon::now()->subWeeks(3)->format('Y-m-d');
        // Retrieve the data from your table
        $data = orderData::select('gen_date', 'contracts', 'quotes', 'weekly_value')
            ->where('gen_date', '>=', $threeWeeksAgo)
            ->get();

        // Format the data for the chart
        $formattedData = [];
        foreach ($data as $row) {
           /* $formattedData[] = [
                'label' => $row->gen_date,
                'y' => $row->contracts,
                'z' => $row->quotes,
            ];*/
            $data = new \stdClass(); 
            $data->label = $row->gen_date;
            $data->bar1 = $row->contracts;
            $data->bar2 = $row->quotes;
            $data->line = $row->weekly_value;
            array_push($formattedData,$data);
        }

        //return response()->json($formattedData);
        //$formattedData = json_encode($formattedData);

        return view('charts')->with('chartData',$formattedData);
    }
} 

