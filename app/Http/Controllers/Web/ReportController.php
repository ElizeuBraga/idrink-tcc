<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use DB;
use Auth;

class ReportController extends Controller
{
    public $months;

    public function __construct(){
        $this->months = [
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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function report(Request $request){
        $r = $request->all();
        $months = $this->months;
        
        if(key_exists('startDate', $r)){
            $from_date = $r['startDate'];
            $to_date = $r['endDate'];
            $report = DB::table('deliveries as d')
            ->join('items as i', 'd.id', '=', 'i.delivery_id')
            ->join('users as u', 'd.customer_id', '=', 'u.id')
            ->select('i.parcial_price', 'd.created_at', 'u.name as customer_name')
            ->whereBetween(DB::raw('DATE(d.created_at)'), array($from_date, $to_date))
            ->where('d.store_id', Auth::user()->id)
            ->get();
        }
        
        if (key_exists('month', $r)) {
            $month = $r['month'];
            $report = DB::table('deliveries as d')
            ->join('items as i', 'd.id', '=', 'i.delivery_id')
            ->join('users as u', 'd.customer_id', '=', 'u.id')
            ->select('i.parcial_price', 'd.created_at', 'u.name as customer_name')
            ->whereMonth(DB::raw('DATE(d.created_at)'), $month)
            ->where('d.store_id', Auth::user()->id)
            ->get();
            
        }

        return view('reports', compact('report', 'r', 'months'));
    }
    
    public function index()
    {
        $months = $this->months;
        $report = [];
        return view('reports', compact('report', 'months'));
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
