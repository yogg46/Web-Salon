@extends('layouts.main')

@section('isi')
    <div class="wizard-v1-wrapper">

        <div id="wizard-step-0" class="inner-wrapper is-active" data-step-title="Project Type">
            <!--src/partials/pages/wizard/wizard-v1/-->
            <div class="step-content">

                <div class="step-title">
                    <h2 class="dark-inverted"></h2>
                </div>

                <div class="wizard-types">
                    <div class="columns ">
                        @if (Auth::user()->role == 'admin')
                            <div class="column is-6">
                                <div class="wizard-card">
                                    <img src="/assets/img/illustrations/wizard/type-1.svg" alt="" />
                                    <h3 class="dark-inverted">Tambah User</h3>
                                    <p></p>
                                    <div class="button-wrap">
                                        <a href="#"
                                            class="button h-button is-primary is-rounded is-elevated is-bold type-select-button">Lanjut</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="wizard-card">
                                    <img src="/assets/img/illustrations/wizard/type-2.svg" alt="" />
                                    <h3 class="dark-inverted">Daftar User</h3>
                                    <p></p>
                                    <div class="button-wrap">
                                        <a href="#"
                                            class="button h-button is-primary is-rounded is-elevated is-bold type-select-button">Lanjut</a>
                                    </div>

                                </div>
                            </div>
                        @endif



                        @if (Auth::user()->role == 'kasir')
                            <div class="column is-4">
                                <div class="wizard-card">
                                    <img src="/assets/img/illustrations/wizard/type-1.svg" alt="" />
                                    <h3 class="dark-inverted">Kasir</h3>
                                    <p></p>
                                    <div class="button-wrap">
                                        <a href="/kasir"
                                            class="button h-button is-primary is-rounded is-elevated is-bold type-select-button">Lanjut</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="wizard-card">
                                    <img src="/assets/img/illustrations/wizard/type-2.svg" alt="" />
                                    <h3 class="dark-inverted">Jasa</h3>
                                    <p></p>
                                    <div class="button-wrap">
                                        <a href="#"
                                            class="button h-button is-primary is-rounded is-elevated is-bold type-select-button">Lanjut</a>
                                    </div>

                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="wizard-card">
                                    <img src="/assets/img/illustrations/wizard/type-3.svg" alt="" />
                                    <h3 class="dark-inverted">Laporan</h3>
                                    <p></p>
                                    <div class="button-wrap">
                                        <a href="#"
                                            class="button h-button is-primary is-rounded is-elevated is-bold type-select-button">Lanjut</a>
                                    </div>

                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    @endsection
