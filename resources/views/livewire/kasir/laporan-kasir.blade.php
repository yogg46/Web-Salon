<div>

    {{-- @include('livewire.kasir.view-rinci') --}}

    {{-- @dd($rinci) --}}
    {{-- @json($rinci) --}}
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            {{-- <div class="page-title has-text-centered is-webapp">

                <div class="title-wrap">
                    <h1 class="title is-4"></h1>
                </div>

            </div> --}}

            <div class="datatable-toolbar">

                <div class="field ">
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
                    {{-- <input type="date" wire:model="startDate"> - <input type="date" wire:model="endDate"> --}}
                    <div class="field ">
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
        <div class="field ">
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
        <div class="buttons">
                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel') }}" target="_blank">Export Excel Perbulan </a>
                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel-all') }}" target="_blank">Export Excel</a>

        </div>


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
                                <th>Kasir</th>
                                <th>Layanan</th>
                                <th>Jumlah</th>
                                {{-- <th>Suplier</th> --}}
                                <th>Subtotal</th>
                                {{-- <th>Rincian</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            {{-- @foreach ($item as $v)
                                <tr>
                                    <td  >{{ $v->manufaktur }}</td>
                                    <td>{{ $v->tanggal }}</td>
                                    <td>{{ $v->layananRelasiUser->name }}</td>

                                    <td>Rp. {{ $v->total }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach --}}
                            @php
            $no = 1;
        @endphp
                            @foreach ($item as $v)
                            <tr>
                                <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                                    {{ $no++ }}
                                </td>
                                <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                                    {{ $v->manufaktur }}
                                </td>
                                <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                                    {{ $v->tanggal }}
                                </td>
                                <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                                    {{ $v->layananRelasiUser->name }}
                                </td >
                            </tr>
                            @foreach ($v->layananRelasiDetail as $items)
                            <tr>
                                <td>
                                    {{ $items->detailRelasiJasa->jasaRelasiKategori->kategori }} - {{ $items->detailRelasiJasa->nama_jasa }}
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
                            <tr>
                                <th colspan="4"></th>

                                <th>Total</th>
                                <th>{{ $item->sum(function($layanan) { return $layanan->layananRelasiDetail->sum('jumlah'); }) }}</th>
                                {{-- <th>Suplier</th> --}}
                                <th>{{ 'Rp. '.number_format($item->sum(function($layanan) { return $layanan->layananRelasiDetail->sum('subtotal'); }), 0, ',', '.') }}</th>
                                {{-- <th>Rincian</th> --}}
                            </tr>
                        </tfoot>
                    </table>

                </div>

                {{-- <nav class="w-full sm:w-auto sm:mr-auto"> --}}
                {{-- {{ $layanan->onEachSide(1)->links('layouts.pagination') }} --}}


            </div>

        </div>
    </div>
</div>
