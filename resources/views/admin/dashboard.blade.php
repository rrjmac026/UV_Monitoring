<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Water Level Monitoring Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="mb-6 bg-gradient-to-r from-blue-500 to-cyan-500 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mt-2 opacity-90">Monitor your water sensors in real-time</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Current Water Level -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Current Level</p>
                                <p id="current-level" class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">
                                    --
                                </p>
                            </div>
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                </svg>
                            </div>
                        </div>
                        <p id="last-update" class="text-xs text-gray-500 dark:text-gray-400 mt-2">Loading...</p>
                    </div>
                </div>

                <!-- Average Today -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Average Today</p>
                                <p id="avg-today" class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">
                                    --
                                </p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Readings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Readings</p>
                                <p id="total-readings" class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-2">
                                    --
                                </p>
                            </div>
                            <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Critical Alerts -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Critical Alerts</p>
                                <p id="critical-readings" class="text-3xl font-bold text-red-600 dark:text-red-400 mt-2">
                                    --
                                </p>
                            </div>
                            <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                                <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Water Level History</h3>
                    <!-- Fixed chart container with defined height -->
                    <div class="relative" style="height: 400px;">
                        <canvas id="waterLevelChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Readings Table -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Recent Readings</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Time</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Water Level</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">IP Address</th>
                                </tr>
                            </thead>
                            <tbody id="readings-table" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Data will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        let chart = null;

        // Fetch dashboard data
        async function fetchDashboardData() {
            try {
                const response = await fetch('/api/dashboard-data');
                const data = await response.json();
                
                // Update stats
                document.getElementById('current-level').textContent = data.current_level + '%';
                document.getElementById('avg-today').textContent = data.avg_today + '%';
                document.getElementById('total-readings').textContent = data.total_readings;
                document.getElementById('critical-readings').textContent = data.critical_readings;
                document.getElementById('last-update').textContent = 'Updated ' + data.last_update;
                
                // Update chart
                updateChart(data.recent_readings);
                
                // Update table
                updateTable(data.recent_readings);
                
            } catch (error) {
                console.error('Error fetching dashboard data:', error);
            }
        }

        // Update chart
        function updateChart(readings) {
            const ctx = document.getElementById('waterLevelChart').getContext('2d');
            
            const labels = readings.map(r => new Date(r.created_at).toLocaleTimeString());
            const values = readings.map(r => r.water_level);
            
            if (chart) {
                chart.destroy();
            }
            
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Water Level (%)',
                        data: values,
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2.5,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: document.documentElement.classList.contains('dark') ? '#fff' : '#000',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#4b5563',
                                callback: function(value) {
                                    return value + '%';
                                }
                            },
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                            }
                        },
                        x: {
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#4b5563',
                                maxRotation: 45,
                                minRotation: 45
                            },
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                            }
                        }
                    }
                }
            });
        }

        // Update table
        function updateTable(readings) {
            const tbody = document.getElementById('readings-table');
            tbody.innerHTML = '';
            
            readings.slice(-10).reverse().forEach(reading => {
                const status = reading.water_level < 20 ? 'Critical' : 
                              reading.water_level < 50 ? 'Low' : 
                              reading.water_level < 75 ? 'Normal' : 'High';
                              
                const statusColor = reading.water_level < 20 ? 'text-red-600' : 
                                   reading.water_level < 50 ? 'text-yellow-600' : 
                                   reading.water_level < 75 ? 'text-green-600' : 'text-blue-600';
                
                const row = `
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            ${new Date(reading.created_at).toLocaleString()}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            ${reading.water_level.toFixed(2)}%
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold ${statusColor}">
                            ${status}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            ${reading.ip_address || 'N/A'}
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        }

        // Initial load
        fetchDashboardData();
        
        // Auto-refresh every 10 seconds
        setInterval(fetchDashboardData, 10000);
    </script>
</x-app-layout>