@extends('layouts.main')

@section('isi')
    @if (Auth::user()->role == 'kasir')
        <div class="personal-dashboard personal-dashboard-v1">

            <!--Header-->
            {{-- <div class="dashboard-header">
                <!-- <div class="h-avatar is-large">
                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
            </div> -->
                <div class="start">
                    <h3>Selamat datang di dashboard</h3>
                </div>
                <!-- <div class="end">
                <button class="button h-button is-dark-outlined">View Reports</button>
                <button class="button h-button is-primary is-elevated">Manage Store</button>
            </div> -->
            </div> --}}

            <!--Body-->
            <div class="personal-dashboard personal-dashboard-v3">
                <div class="columns">

                    <!--Card-->
                    <div class="column is-8">
                        <div class="stats-wrapper">
                            <!--Stat-->

                            <div class="columns is-multiline is-flex-tablet-p">
                                <!-- <stat> -->
                                <div class="column is-6">
                                    <div class="dashboard-card">
                                        <div class="media-flex-center">
                                            <div class="h-icon is-purple is-rounded">
                                                <i class="lnil lnil-analytics-alt-1"></i>
                                            </div>
                                            <div class="flex-meta">
                                                <span>62K</span>
                                                <span>Jasa</span>
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
                                                <span>62K</span>
                                                <span>Laporan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endif
@endsection
