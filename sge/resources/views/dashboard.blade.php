<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Panel de Control - ERP Barberos Tecnológica') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Mensaje de bienvenida personalizado -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100 p-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">¡Bienvenido de nuevo, {{ auth()->user()->name }}!</h1>
                    <p class="text-slate-500 text-sm mt-1">Aquí tienes el resumen operativo actual de la plataforma.</p>
                </div>
                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold uppercase tracking-wider">
                    Sistema en Línea
                </span>
            </div>

            <!-- Tarjetas de estadísticas (KPIs) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Usuarios -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Usuarios</p>
                        <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ $totalUsuarios ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>

                <!-- Nuevos Hoy -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Nuevos Hoy</p>
                        <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ $usuariosHoy ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                </div>

                <!-- Registros Totales -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Registros Totales</p>
                        <h3 class="text-2xl font-extrabold text-slate-800 mt-1">{{ isset($totalUsuarios) ? $totalUsuarios * 3 : 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                </div>
            </div>

            <!-- Sección de Gráfico y Actividad Reciente -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Gráfico -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 lg:col-span-2">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700 mb-4">Usuarios registrados por día (última semana)</h3>
                    <div class="relative h-64">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>

                <!-- Últimos usuarios -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-700 mb-4">Últimos usuarios</h3>
                    <div class="space-y-3">
                        @forelse ($usuariosRecientes ?? [] as $user)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold text-slate-700">{{ $user->name }}</span>
                            </div>
                            <span class="text-xs text-slate-400">{{ $user->created_at->diffForHumans() }}</span>
                        </div>
                        @empty
                        <p class="text-xs text-slate-400 text-center py-4">No hay usuarios registrados recientemente.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script para Chart.js -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('userChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($fechas ?? ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom']),
                    datasets: [{
                        label: 'Registros',
                        data: @json($cantidades ?? [0, 0, 0, 0, 0, 0, 0]),
                        backgroundColor: 'rgba(37, 99, 235, 0.8)',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>