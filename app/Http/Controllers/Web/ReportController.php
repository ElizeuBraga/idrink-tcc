<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use DB;
use Auth;
use Lava;
use Input;
use Carbon\Carbon;
use App\Delivery;

class ReportController extends Controller
{
    // public $months;

    private $months = [
        1 => 'Janeiro', 
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function grafics(){
         $now = Carbon::now();

         $january = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '1')
         ->sum('total_price');
         $february = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '2')
         ->sum('total_price');
         $march = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '3')
         ->sum('total_price');
         $april = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '4')
         ->sum('total_price');
         $may = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '5')
         ->sum('total_price');
         $june = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '6')
         ->sum('total_price');
         $july = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '7')
         ->sum('total_price');
         $august = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '8')
         ->sum('total_price');
         $september = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '9')
         ->sum('total_price');
         $octuber = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '10')
         ->sum('total_price');
         $november = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '11')
         ->sum('total_price');
         $december = Delivery::where('store_id', '=', Auth::user()->id)
         ->whereYear('created_at', $now->year)
         ->whereMonth('created_at', '12')
         ->sum('total_price');

         $deliveries = Lava::DataTable();

         $deliveries->addStringColumn('Deliveries')
         ->addNumberColumn('Vendas')
         ->addRow(['Janeiro', $january])
         ->addRow(['Fevereiro', $february])
         ->addRow(['Março', $march])
         ->addRow(['April', $april])
         ->addRow(['Maio', $may])
         ->addRow(['Junho', $june])
         ->addRow(['Julho', $july])
         ->addRow(['Agosto', $august])
         ->addRow(['Setembro', $september])
         ->addRow(['Outubro', $octuber])
         ->addRow(['Novembro', $november])
         ->addRow(['Dezembro', $december]);

        $grafic = Lava::AreaChart('Deliveries', $deliveries);
        return $grafic;
     }

     public function report(Request $request){
         
         $months = $this->months;
         $deliveries = $this->grafics();
         
         if (count(Input::get()) == 2) {
            $startInput = Input::get('start');
            $endInput = Input::get('end');
            $start = \Carbon\Carbon::createFromFormat('d-m-Y', $startInput);
            $end = \Carbon\Carbon::createFromFormat('d-m-Y', $endInput);
            $dates = [$startInput, $endInput];

            $report = DB::table('deliveries as d')
            ->join('items as i', 'd.id', '=', 'i.delivery_id')
            ->join('users as u', 'd.customer_id', '=', 'u.id')
            ->select('d.total_price', 'd.created_at', 'u.name as customer_name')
            ->whereDate('d.created_at', '>=', $start)
            ->whereDate('d.created_at', '<=', $end)
            ->where('d.store_id', Auth::user()->id)
            ->get();

            return view('reports', compact('report', 'months', 'deliveries', 'dates'));

        }else{
            $month = Input::get('month');
            $report = DB::table('deliveries as d')
            ->join('items as i', 'd.id', '=', 'i.delivery_id')
            ->join('users as u', 'd.customer_id', '=', 'u.id')
            ->select('d.total_price', 'd.created_at', 'u.name as customer_name')
            ->whereMonth('d.created_at', $month)
            ->where('d.store_id', Auth::user()->id)
            ->get();

            return view('reports', compact('report', 'months', 'deliveries', 'month'));
        }
        
        
        // if (key_exists('month', $r)) {
        //     $month = $r['month'];
        //     $report = DB::table('deliveries as d')
        //     ->join('items as i', 'd.id', '=', 'i.delivery_id')
        //     ->join('users as u', 'd.customer_id', '=', 'u.id')
        //     ->select('d.total_price', 'd.created_at', 'u.name as customer_name')
        //     ->whereMonth(DB::raw('DATE(d.created_at)'), $month)
        //     ->where('d.store_id', Auth::user()->id)
        //     ->get();
            
        //     return view('reports', compact('report', 'r', 'months', 'month', 'deliveries'));
        // }


    }
    
    public function index()
    {
        $months = $this->months;
        $report = [];
        $deliveries = $this->grafics();
        return view('reports', compact('report', 'months', 'deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($startDate, $endDate)
    {
        $report = table('deliveries as d')
        ->join('items as i', 'd.id', '=', 'i.delivery_id')
        ->select('i.parcial_price')
        ->whereBetween('d.created_at', [$startDate, $endDate])
        ->where('d.store_id', Auth::user()->id)
        ->get();
        
        dd($report);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
