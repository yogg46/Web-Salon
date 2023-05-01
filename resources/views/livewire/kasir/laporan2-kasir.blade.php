<div>
    {{-- @if ($select == 1)
    @include('livewire.gudang.view-rinci')
    @endif
    @if ($select == 2)
    @include('livewire.kasir.view-rinci')
    @endif --}}
    {{-- @dd($rinci) --}}
    {{-- @json($rinci) --}}
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-title has-text-centered is-webapp">

                <div class="title-wrap">
                    <h1 class="title is-4"></h1>
                </div>

            </div>

            <div class="datatable-toolbar">

                <div class="field ml-2">
                    <div class="control has-icons-left">
                        <div class="select">
                            <select wire:model="selectedDay" class="datatable-filter datatable-select form-control" id="day">
                                <option value="">Semua Hari</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <i class="lnil lnil-timer"></i>
                        </div>
                    </div>
                </div>
                <div class="field ml-2">
                    <div class="control has-icons-left">
                        <div class="select">
                            <select wire:model="selectedMonth"  class="datatable-filter datatable-select form-control" id="month">
                                <option value="">Semua Bulan</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <i class="lnil lnil-timer"></i>
                        </div>
                    </div>
                </div>
                <div class="field ml-2">
                    <div class="control has-icons-left">
                        <div class="select">
                            <select wire:model="selectedYear"  class="datatable-filter datatable-select form-control" id="year">

                                @foreach ( $tanggal->unique() as $key )
                                <option value="{{ $key }}">{{ $key }}</option>
                                @endforeach
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="icon is-small is-left">
                            <i class="lnil lnil-timer"></i>
                        </div>
                    </div>
                </div>
                {{-- <div class="buttons">

                    <button class="button h-button is-primary is-elevated h-modal-trigger" data-modal="add-barang">
                        <span class="icon">
                            <i aria-hidden="true" class="fas fa-plus"></i>
                        </span>
                        <span>Tambah Stok</span>
                    </button>
                </div> --}}
            </div>

            <div class="page-content-inner is-webapp">

                <!-- Datatable -->


                <div class="table-wrapper">
                    <table id="" class="table is-datatable is-hoverable table-is-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Manufaktur</th>
                                <th>tanggal</th>
                                <th>Petugas Gudang</th>
                                <th>Suplier</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                {{-- <th>Rincian</th> --}}
                            </tr>
                        </thead>
@php
    $no =1;
@endphp
                        <tbody>
                            @foreach ($pembelian as $v)
                                <tr>
                                    <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $no++ }}</td>
                                    <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->manufaktur }}</td>
                                    <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->tanggal->format('d-m-Y') }}</td>
                                    <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->pembelianRelasiUser->name }}</td>
                                    <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->pembelianRelasiSuplier->nama_suplier }}</td>
                                    {{-- <td>Rp. {{ $v->total }}</td> --}}

                                </tr>
                                @foreach ($v->pembelianRelasiDetail as $items)
                            <tr>
                                <td>
                                      {{ $items->detailRelasiBarang->nama_barang }}
                                </td>
                                <td>
                                    {{ $items->jumlah }}
                                </td>
                                <td>
                                    Rp. {{number_format( $items->subtotal) }}
                                </td>
                            </tr>
                            @endforeach
                            @endforeach

                        </tbody>
                        <tfoot>
                            <th colspan="5">

                            </th>
                            <th>Total</th>
                            <th>{{ $pembelian->sum(function($layanan) { return $layanan->pembelianRelasiDetail->sum('jumlah'); }) }}</th>
                            <th>{{ 'Rp. '.number_format($pembelian->sum(function($layanan) { return $layanan->pembelianRelasiDetail->sum('subtotal'); }), 0, ',', '.') }}</th>
                        </tfoot>
                    </table>

                </div>

                {{-- <nav class="w-full sm:w-auto sm:mr-auto"> --}}


                {{-- </nav> --}}







            </div>

        </div>
    </div>
</div>
