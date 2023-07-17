@extends('layouts.app')
@include('layouts.navbar')

<div class="flex flex-wrap justify-center mt-3">
    <div class="w-1/4 pb-6">
        <div class="h-32 flex items-center justify-center">
            <p id="digital-clock"
                class="text-gray-800 dark:text-red-500 font-bold text-4xl lg:text-6xl sm:text-sm drop-shadow-lg">Jam</p>
        </div>
    </div>
    <div class="w-2/4 pb-6 pr-3 pl-3">
        <div class="rounded-lg h-32 flex" style="background-image: url('/image/dashboard.jpg');">
            <p class="text-gray-800 dark:text-white text-xl font-bold mt-12 ml-10 drop-shadow-lg">Dashboard Admin</p>
        </div>
    </div>
    <div class="w-1/4 pb-6">
        <div class="h-32 flex flex-col items-center justify-center">
            <p id="date" class="text-gray-800 dark:text-red-500 text-xl">Tanggal</p>
            <p id="day" class="text-gray-800 dark:text-white text-lg font-bold mt-2">Hari</p>
        </div>
    </div>
</div>

<form action="{{ route('home') }}" method="GET" class="mb-5 px-4">
    <div class="flex items-center">
        <label for="search" class="mr-2 dark:text-white">Tahun:</label>
        <select name="search" id="search" class="border border-gray-300 rounded-lg p-2">
            <option value="">Terbaru</option>
            @for ($year = date('Y'); $year >= 2020; $year--)
                <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 ml-2 inline-flex items-center">
            Filter

        </button>
    </div>
</form>


<div class="flex mb-12 ml-3 mr-6">
    <div
        class="w-full lg:w-9/12 bg-blue-200 dark:bg-blue-950 shadow-blue2 border border-blue-300 p-10 rounded-lg flex items-center justify-center lg:mb-0">
        <canvas id="myChart" class="w-full h-full"></canvas>
    </div>
    <div class="w-full lg:w-3/12 flex flex-col lg:ml-4">
        <div class="flex flex-col bg-red-500 dark:bg-red-950 border border-red-500 rounded-full mb-4 shadow-red">
            <div class="p-4">
                <span class="text-white font-bold">Jumlah Anggota: </span>
                <span class="text-white"><b>{{ $totalAnggota }}</b> Orang</span>
            </div>
        </div>
        <div class="flex flex-col bg-blue-300 dark:bg-blue-950 border border-blue-500 rounded-full shadow-blue mb-4">
            <div class="p-4">
                <span class="text-white font-bold">Jumlah OTA:</span>
                <span class="text-white"><b>{{ $totalDaftarOta }}</b> Orang</span>
            </div>
        </div>
        <div class="flex flex-col bg-gray-500 dark:bg-gray-750 border border-white-500 shadow-gray rounded-full">
            <div class="p-4">
                <span class="text-white font-bold">Jumlah Pesantren:</span>
                <span class="text-white"><b>{{ $totalPondok }}</b>&nbsp; Pondok</span>
            </div>
        </div>
        <div
            class="flex flex-col mt-4 bg-green-400 dark:bg-green-950 border border-green-500 shadow-green rounded-full">
            <div class="p-4">
                <span class="text-white font-bold">Total Donasi Masuk {{ $tahun }}:</span>
                <span class="text-white"><b>Rp.{{ number_format($totalDanaMasuk, 0, ',', '.') }}</b></span>
            </div>
        </div>
        <div
            class="flex flex-col mt-4 bg-yellow-500 dark:bg-yellow-600 border border-yellow-300 shadow-yellow rounded-full">
            <div class="p-4">
                <span class="text-white font-bold">Total Beras Disampaikan {{ $tahun }}:
                    {{ number_format($totalBerasDonasi, 3, ',', '.') }} SAK</span>
                <span class="text-white"><b></span>
            </div>
        </div>
        <div
            class="flex flex-col pb-3 mt-4 bg-purple-200 dark:bg-blue-900  dark:text-white border border-blue-300 shadow-purple rounded-lg">
            <canvas id="myChart2" class="w-full h-auto"></canvas>
        </div>

    </div>

    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // =========== CHART BAR ============

        var ctx = document.getElementById('myChart').getContext('2d');
        var gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
        gradient.addColorStop(1, 'rgba(75, 192, 192, 0.8)');

        var data = [
            @foreach ($totalBerasDonasiPerBulan as $total)
                {{ $total }},
            @endforeach
        ];

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Grafic Data',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        // =========== CHART DONAT ============

        var ctx = document.getElementById('myChart2').getContext('2d');
        var data = {
            labels: ['Jumlah Anggota', 'Jumlah OTA', 'Jumlah Pondok Mitra'],
            datasets: [{
                label: ['Jumlah Total'],
                data: [{{ $totalAnggota }},
                    {{ $totalDaftarOta }}, {{ $totalPondok }}
                ],
                backgroundColor: ['rgb(255, 99, 100)', 'rgb(54, 162, 235)', 'rgb(29, 205, 86)'],
                hoverOffset: 10
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    angleLines: {
                        display: true
                    },
                    suggestedMin: 0,
                    suggestedMax: 350,
                    grid: {
                        color: '#ccc',
                        circular: true
                    },
                    pointLabels: {
                        color: '#333',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        };

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });

        // ========== JAM DIGITAL ==========
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var time = hours + ':' + minutes + ':' + seconds;
            document.getElementById('digital-clock').textContent = time;

            setTimeout(updateClock, 1000);
        }

        updateClock();

        function updateDateAndDay() {
            var now = new Date();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var date = now.toLocaleDateString('id-ID', options);
            var day = now.toLocaleDateString('id-ID', {
                weekday: 'long'
            });

            document.getElementById('date').textContent = date;
            document.getElementById('day').innerHTML = "Sekarang hari <mark>" + day + "</mark>";
        }

        updateDateAndDay();

        var calendarButton = document.getElementById('calendar-button');
        calendarButton.addEventListener('click', openCalendar);

        function showLoading() {
            document.querySelector('#loading').classList.add('loading');
            document.querySelector('#loading-content').classList.add('loading-content');
        }

        function hideLoading() {
            document.querySelector('#loading').classList.remove('loading');
            document.querySelector('#loading-content').classList.remove('loading-content');
        }
    </script>
