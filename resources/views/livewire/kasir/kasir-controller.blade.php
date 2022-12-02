<div>
    {{-- <div id="app-apex-charts" class="view-wrapper is-webapp" data-menu-item="#dashboards-navbar-menu"
        data-mobile-item="#home-sidebar-menu-mobile"> --}}

    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            {{-- <div class="page-title has-text-centered is-webapp">

                    <div class="title-wrap">
                        <h1 class="title is-4">SALON FRANSISCO</h1>
                    </div>

                </div> --}}

            <div class="page-content-inner">

                <!--Food Delivery Dashboard-->
                <div class="food-delivery-dashboard">

                    <!--Left-->
                    <div class="left">


                        <div class="left-body">
                            <div class="restaurants">
                                <div class="restaurants-toolbar">
                                    <div class="left">
                                        <h3>SALON KECANTIKAN </h3>
                                    </div>
                                    <br>
                                    {{ var_export($cek) }}
                                    {{ var_export($jumlah) }}
                                    <div class="right">
                                    </div>
                                </div>

                                <div wire:ignore class="food-pills">
                                    <div class="food-pills-inner pill-carousel">
                                        <!--Pill-->
                                        <div wire:click="susus('')" class="food-pill">

                                            <div class="food-pill-icon">
                                                {{-- <img src="assets/img/illustrations/dashboards/food/icon-1.svg"
                                                    alt=""> --}}
                                                <span>All</span>
                                            </div>
                                            {{-- <span>All</span> --}}
                                        </div>
                                        <!--Pill-->
                                        @foreach ($kate as $p)
                                            <div class="food-pill" wire:click="susus({{ $p->id }})">
                                                <div class="food-pill-icon">
                                                    <img src="assets/img/illustrations/dashboards/food/icon-2.svg"
                                                        alt="">
                                                </div>
                                                <span>{{ $p->kategori }}</span>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>

                                <div class="page-content-inner">

                                    <!--SaaS Billing-->


                                    <div class="restaurants-list">
                                        <div class="columns is-multiline">
                                            <!--Restaurant-->


                                            @foreach ($jasa as $j)
                                                <div class="column is-4">
                                                    <div class="">
                                                        <div class="inputGroup s-card is-raised demo-s-card">
                                                            <input {{-- wire:change='rep({{ $j->id }})' --}} wire:model="cek"
                                                                type="checkbox" value="{{ $j->id }}"
                                                                id="option{{ $j->id }}">
                                                            <label class="title is-6"
                                                                for="option{{ $j->id }}">{{ $j->nama_jasa }}</label>
                                                            {{-- <h3 >Raised S-Card</h3> --}}

                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach



                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- {{ $bar }} --}}
                    {{-- @dd($harga[1]) --}}
                    {{-- @json($bar) --}}
                    <div wire:ignore.self class="right fixed-parent">
                        <div wire:ignore.self class="sticky-panel fixed-child">
                            {{-- <div class="widget icon-toolbar-widget">
                                <div class="icon-toolbar">
                                    <div class="toolbar-icon">
                                        <a class="inner-icon is-active" data-section="cart-section">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                    </div>

                                </div>
                            </div> --}}
                            {{-- @dd($harga) --}}

                            <div id="cart-section" class="cart-widget side-section is-active">
                                <div class="widget-toolbar">
                                    <div class="left">
                                        <h3 class="is-bigger">NOTA</h3>
                                    </div>
                                    <div class="right">
                                        <span class="tag is-curved">{{ array_sum($jumlah) }} items</span>
                                        {{-- <span class="tag is-curved">{{ var_export($jumlah) }} items</span> --}}
                                    </div>
                                </div>
                                <!-- <div class="section-placeholder">
                                        <div class="placeholder-content">
                                            <img src="assets/img/illustrations/dashboards/food/cart-placeholder.svg" alt="">
                                            <h3 class="dark-inverted">No Items</h3>
                                            <p>Your cart is currently empty. Start adding products.</p>
                                        </div>
                                    </div> -->

                                <div class="cart-items has-slimscroll ">

                                    <form wire:submit.prevent="save()">
                                        <div class="columns is-multiline">

                                            @foreach ($cek as $c => $value)
                                                <div class="column is-8">

                                                    <div class="cart-item">
                                                        <div class="meta">
                                                            <span class="text">
                                                                <tr>

                                                                    <td class=" is-end">
                                                                        {{ $bar[$value] }}
                                                                    </td>

                                                                </tr>
                                                            </span>
                                                            <span class="price">Rp.
                                                                {{ $harga[$value] }}

                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="column is-4">
                                                    {{-- {{ var_export($jumlah) }} --}}
                                                    <div class="field">
                                                        {{-- <label>Jumlah</label> --}}
                                                        <div
                                                            class="control  @error('jumlah.{{ $value }}') has-validation has-error @enderror">
                                                            <input type="number" min="1"
                                                                wire:model='jumlah.{{ $value }}'
                                                                wire:change='TOT({{ $value }})'
                                                                class="input is-primary-focus">


                                                            @error('jumlah.{{ $value }}')
                                                                <span class="error  text-danger">{{ $message }}</span>
                                                            @enderror


                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                </div>

                                <div class="cart-button">
                                    <div class="total">
                                        <span class="label">Total</span>
                                        <span>Rp. {{ $total }}</span>
                                    </div>
                                    <button type="submit" wire:submit.prevent="save()"
                                        class="button h-button is-primary is-raised is-bold is-fullwidth">
                                        CETAK
                                    </button>
                                </div>
                                </form>

                            </div>







                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- </div> --}}
</div>
