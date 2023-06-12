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
                                            <h3> </h3>
                                        </div>
                                        <br>

                                        <div class="right">
                                        </div>
                                    </div>

                                    <div wire:ignore class="food-pills">
                                        <div class="food-pills-inner pill-carousel">
                                            <!--Pill-->
                                            <div wire:click="susus('')" class="food-pill">

                                                <div class="food-pill-icon">

                                                    <span style="color: black;">All</span>
                                                </div>

                                            </div>
                                            <!--Pill-->
                                            @foreach ($kate as $p)
                                            <div class="food-pill" wire:click="susus({{ $p->id }})">
                                                <div class="food-pill-icon h-icon">
                                                    <i class="lnir lnir-shopping-basket"></i>


                                                </div>
                                                <span>{{ $p->kategori }}</span>
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class="page-content-inner">




                                        <div class="restaurants-list">
                                            <div class="columns is-multiline">



                                                @foreach ($jasa as $j)

                                                <div class="column is-4">
                                                    <div class="restaurants-list-item">
                                                        <div class="r-card is-raised">

                                                            <div class="meta-container">
                                                                <div class="meta-icon">
                                                                    <div class="animated-checkbox" wire:ignore>
                                                                        <input wire:loading.attr='disabled' wire:change='rep({{ $j->id }})'
                                                                            wire:model="cek" type="checkbox"
                                                                            value="{{ $j->id }}"
                                                                            id="option{{ $j->id }}">
                                                                        <div class="checkmark-wrap">
                                                                            <div class="shadow-circle"></div>
                                                                            <svg class="checkmark"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 52 52">
                                                                                <circle class="checkmark-circle" cx="26"
                                                                                    cy="26" r="25" fill="none">
                                                                                </circle>
                                                                                <path class="checkmark-check"
                                                                                    fill="none"
                                                                                    d="M14.1 27.2l7.1 7.2 16.7-16.8">
                                                                                </path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="meta-content">
                                                                    <h4>{{ $j->nama_jasa }}</h4>
                                                                    <p>
                                                                        <span>{{ $j->jasaRelasiKategori->kategori
                                                                            }}</span>

                                                                    </p>

                                                                </div>
                                                            </div>
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

                        <div wire:ignore.self class="right fixed-parent">
                            <div wire:ignore.self class="sticky-panel fixed-child">


                                <div id="cart-section" class="cart-widget side-section is-active  "
                                    style="padding-bottom: 60px">
                                    <div class="widget-toolbar">
                                        {{-- <div class="left">


                                            <h3 class="is-bigger">NOTA</h3>

                                        </div>
                                        <div class="right"> --}}
                                            <div class="field " style="width: 100%;">
                                                <div class="control has-icons-left" style="width: 100%;">
                                                    <div class=" select" style="width: 100%;">

                                                        <select class="is-bigger form-control h-select" wire:model='pp'>
                                                            <option value=""> Pilih Print</option>
                                                            @foreach ($lis as $printer)
                                                            <option value="{{ $printer['NAME'] }}" {{
                                                                $pp==$printer['NAME'] ? 'selected' : '' }}>
                                                                {{ $printer['NAME'] }}
                                                            </option>
                                                            @endforeach
                                                            {{-- <option value=""></option> --}}
                                                        </select>
                                                    </div>
                                                    <div class="icon is-small is-left">
                                                        <i class="lnil lnil-printer"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- {{ $pp }} --}}
                                            {{--
                                        </div> --}}
                                    </div>


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
                                                                {{ number_format($harga[$value]) }}

                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div
                                                    class="column  is-4 @error('jumlah.{{ $value }}') bg-danger @enderror">
                                                    {{-- {{ var_export($jumlah) }} --}}
                                                    <div class="field">
                                                        {{-- <label>Jumlah</label> --}}
                                                        <div
                                                            class="control  @error('jumlah.{{ $value }}') has-validation has-error @enderror">
                                                            <input type="number" min="1" style="color: black;"
                                                                onfocus="this.style.color='blue';" required
                                                                onblur="this.style.color='black';"
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

                                        <div class="">
                                            <div style="display: -webkit-box;
                                        display: -ms-flexbox;
                                        display: flex;
                                        -webkit-box-align: center;
                                        -ms-flex-align: center;
                                        align-items: center;
                                        -webkit-box-pack: justify;
                                        -ms-flex-pack: justify;
                                        justify-content: space-between;
                                        ">

                                                <span class="label text-gray-500"> Total</span>

                                                <span class="label">Rp. {{ number_format($total) }}</span>

                                            </div>
                                            <div style="display: -webkit-box;display: -ms-flexbox;
                                        display: flex;  -webkit-box-align: center;
                                        -ms-flex-align: center;
                                        align-items: center;
                                        -webkit-box-pack: justify;
                                        -ms-flex-pack: justify;
                                        justify-content: space-between;
                                        ">

                                                <span class="label text-gray-500"> Tunai</span>

                                                {{-- <span class="label"></span> --}}
                                                <div class="control  pl-4">

                                                    <input type="number" min="0" step="1000"
                                                        style="text-align:right;font-style: bold;"
                                                        wire:model.lazy="bayar" class="input is-primary-focus">
                                                    @error('bayar')
                                                    <span class="error  text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div style="display: -webkit-box;
                                        display: -ms-flexbox;
                                        display: flex;
                                        -webkit-box-align: center;
                                        -ms-flex-align: center;
                                        align-items: center;
                                        -webkit-box-pack: justify;
                                        -ms-flex-pack: justify;
                                        justify-content: space-between;
                                        ">

                                                <span class="label text-gray-500"> Kembali</span>

                                                <span class="label">Rp. {{ number_format($bayar - $total) }}</span>

                                            </div>


                                        </div>
                                        <button type="submit" onclick="show_my_receipt()" wire:submit.prevent="save()"
                                            class="button h-button is-primary is-raised  is-bold is-fullwidth">
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




        @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('openNewTab', function(url) {
                    window.open(url);
                });
            });
        </script>
        @endpush
    </div>