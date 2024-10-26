<div class="w-[60%] p-6 bg-white rounded-lg shadow-lg h-full ">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-700">Student Statistics</h2>
        <div class="relative">
            <button class="bg-purple-100 text-purple-500 px-3 py-1 text-sm rounded-full">Yearly</button>
        </div>
    </div>
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2017', '2018', '2019', '2020', '2021'],
            datasets: [{
                label: 'Statistics',
                data: [200, 400, 300, 700, 600],
                backgroundColor: [
                    'rgba(156, 163, 175, 0.5)', // Gray
                    'rgba(156, 163, 175, 0.5)', // Gray
                    'rgba(156, 163, 175, 0.5)', // Gray
                    'rgba(168, 85, 247, 0.7)', // Purple (highlighted)
                    'rgba(156, 163, 175, 0.5)' // Gray
                ],
                borderColor: [
                    'rgba(156, 163, 175, 1)',
                    'rgba(156, 163, 175, 1)',
                    'rgba(156, 163, 175, 1)',
                    'rgba(168, 85, 247, 1)', // Purple
                    'rgba(156, 163, 175, 1)'
                ],
                borderWidth: 1,
                borderRadius: 5,
                barPercentage: 0.6
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#6B7280', // Gray
                    },
                },
                x: {
                    ticks: {
                        color: '#6B7280', // Gray
                    },
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
