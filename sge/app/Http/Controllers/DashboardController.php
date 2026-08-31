<?php



namespace App\Http\Controllers;



use App\Models\User;

use Illuminate\Http\Request;

use Carbon\Carbon;



class DashboardController extends Controller

{

public function index()

{

// Estadísticas básicas

$totalUsuarios = User::count();

$usuariosHoy = User::whereDate('created_at', Carbon::today())->count();


// Últimos 5 usuarios registrados

$usuariosRecientes = User::latest()->take(5)->get();



// Datos para el gráfico (usuarios por día de los últimos 7 días)

$fechas = [];

$cantidades = [];



for ($i = 6; $i >= 0; $i--) {

$fecha = Carbon::now()->subDays($i);

$fechas[] = $fecha->format('d/m');

$cantidad = User::whereDate('created_at', $fecha)->count();

$cantidades[] = $cantidad;

}



return view('dashboard.index', compact('totalUsuarios', 'usuariosHoy', 'usuariosRecientes', 'fechas', 'cantidades'));

}

} 

