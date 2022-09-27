<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Entrie;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{

    public function render()
    {

        $totalEntries = Entrie::all()->sum('price');

        $totalOrders = Order::where('status', 'entregada')->orWhere('status', 'pagada')->sum('total');

        $orders = Order::selectRaw('status, count(status) count')
                            ->groupBy('status')
                            ->get();

        $ordersGraphic = Order::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data, sum(total) sum')
                            ->where('status', 'entregada')
                            ->groupBy('year', 'month')
                            ->orderBy('year', 'asc')
                            ->get();

        $entries = Entrie::selectRaw('year(created_at) year, monthname(created_at) month, count(*) data, sum(price) sum')
                            ->groupBy('year', 'month')
                            ->orderBy('year', 'asc')
                            ->get();

        $data = [];

        $data2 = [];

        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        foreach($entries as $entrie){
            foreach($labels as $label){
                $data[$entrie->year][$label] = 0;
                $data2[$entrie->year][$label] = 0;
            }
        }

        foreach($entries as $entrie){

            foreach($labels as $label){

                if($entrie->month === $label ){

                    if($data[$entrie->year][$label] == 0)
                        $data[$entrie->year][$label] = $entrie->sum;

                }
            }

        }

        foreach($ordersGraphic as $order){

            foreach($labels as $label){

                if($order->month === $label ){

                    if($data2[$order->year][$label] == 0)
                        $data2[$order->year][$label] = $order->sum - $data[$entrie->year][$label];

                }
            }

        }

        return view('livewire.admin.dashboard', compact('data', 'data2', 'orders', 'totalEntries', 'totalOrders'))->layout('layouts.admin');
    }
}
