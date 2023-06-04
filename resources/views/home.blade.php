@extends('layouts.main')

@section('isi')

<div class="personal-dashboard personal-dashboard-v1">


    <div class="personal-dashboard personal-dashboard-v3">
        <div class="columns">

            <!--Card-->
            <div class="column is-12">
                <div class="stats-wrapper">
                    <!--Stat-->

                    <div class="columns is-multiline is-flex-tablet-p">
                        <!-- <stat> -->
                        @if (Auth::user()->role == 'kasir' || Auth::user()->role == 'bos' )
                        <div class="column is-6">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>Rp. {{$masuk}}</span>
                                        <span>Pemasukan Hari Ini</span>
                                        {{-- {{now()->format('m-d-Y')}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <stat> -->
                        <div class="column is-6">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>Rp. {{$keluar}}</span>
                                        <span>Pengeluaran Hari Ini</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="dashboard-card is-income">
                                <div style="display: flex;display: flex;
                                justify-content: space-between;">
                                    <div class="left">
                                        <div class="field">

                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="field">
                                            <div class="control">
                                                <form id="filterForm" action="{{ route('filter') }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <select name="waktu" onchange="submitForm()">
                                                        <option value="">Pilih Filter</option>
                                                        <option value="1">7 hari terakhir</option>
                                                        <option value="2">1 bulan terakhir</option>
                                                        <option value="3">3 bulan terakhir</option>
                                                        <option value="4">6 bulan terakhir</option>
                                                        <option value="5">1 tahun terakhir</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="income-chart"></div>
                            </div>
                        </div>

                        @endif

                        @if (Auth::user()->role == 'admin' )
                        <div class="column is-12">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>{{$admin}}</span>
                                        <span>Jumlah User</span>
                                        {{-- {{now()->format('m-d-Y')}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (Auth::user()->role == 'gudang' )
                        <div class="column is-4">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>{{$Suplier}}</span>
                                        <span>Jumlah Suplier </span>
                                        {{-- {{now()->format('m-d-Y')}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>{{$Pengambilan}}</span>
                                        <span>Jumlah Pengambilan Hari ini</span>
                                        {{-- {{now()->format('m-d-Y')}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="dashboard-card">
                                <div class="media-flex-center">
                                    <div class="h-icon is-purple is-rounded">
                                        <i class="lnil lnil-analytics-alt-1"></i>
                                    </div>
                                    <div class="flex-meta">
                                        <span>Rp. {{$Pembelian}}</span>
                                        <span>Total Pembelian Hari ini</span>
                                        {{-- {{now()->format('m-d-Y')}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function submitForm() {
        document.getElementById("filterForm").submit();
    }
    "use strict";
$(document).ready((function() {
	var e = {
		series: [{
			name: "Pengeluaran",
			data: @json($d_keluar)
		}, {
			name: "Pendapatan",
			data: @json($d_masuk)
		}],
		chart: {
			height: 300,
			type: "area",
			toolbar: {
				show: !1
			}
		},
		colors: [themeColors.accent, themeColors.info, themeColors.orange],
		title: {
			text: "",
			align: "center"
		},
		legend: {
			position: "top"
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			width: [2, 2, 2],
			curve: "smooth"
		},
		xaxis: {
			type: "datetime",
			categories: @json($formattedArray)
		},
		tooltip: {
			x: {
				format: "dd/MM/yy HH:mm"
			},
			y: {
				formatter: function(e) {
					return "Rp." + e
				}
			}
		}
	};
	new ApexCharts(document.querySelector("#income-chart"), e).render()
}));
</script>
@endpush