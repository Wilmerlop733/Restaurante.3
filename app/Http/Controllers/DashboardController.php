<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\Plato;

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('Dashboard.index');
    }

  
    public function getData()
    {
        $ingresosPorDia = DB::table('pedidos')
            ->select(DB::raw('DATE(created_at) as fecha'), DB::raw('SUM(total) as ingresos'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('fecha', 'asc')
            ->limit(15)
            ->get();

        $platosMasVendidos = DB::table('pedidos')
            ->join('platos', 'pedidos.idplato', '=', 'platos.id')
            ->select('platos.nombreplato', DB::raw('SUM(pedidos.cantidad) as total_vendido'))
            ->groupBy('pedidos.idplato', 'platos.nombreplato')
            ->orderByDesc('total_vendido')
            ->limit(5)
            ->get();

        $totalIngresos = DB::table('pedidos')->sum('total');
        $totalPedidos = DB::table('pedidos')->count();
        $totalPlatos = DB::table('platos')->count();
        $totalIngredientes = DB::table('ingredientes')->count();

        return response()->json([
            'ingresosDiarios' => $ingresosPorDia,
            'platosMasVendidos' => $platosMasVendidos,
            'kpis' => [
                'ingresos' => $totalIngresos,
                'pedidos' => $totalPedidos,
                'platos' => $totalPlatos,
                'ingredientes' => $totalIngredientes
            ]
        ]);
    }
}
