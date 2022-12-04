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
