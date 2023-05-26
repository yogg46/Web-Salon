<div>
    {{-- @dd($items) --}}
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
                            <select wire:model="selectedDay" class="datatable-filter datatable-select form-control"
                                id="day">
                                <option value="">Semua Hari</option>
                                @for ($i = 1; $i <= 31; $i++) <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{
                                    $i }}</option>
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
                            <select wire:model="selectedMonth" class="datatable-filter datatable-select form-control"
                                id="month">
                                <option value="">Semua Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
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
                            <select wire:model="selectedYear" class="datatable-filter datatable-select form-control"
                                id="year">
                                <option value="">Semua Tahun</option>
                                @foreach ( $tanggal as $key )
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

                    <a class="button h-button is-success  is-elevated"
                        href="{{ route('export-excel-laporan-bulan',$selectedMonth) }}" target="_blank">Export Bulan {{
                        $selectedMonth == '01' ? 'Januari' : ($selectedMonth == '02' ? 'Februari' : ($selectedMonth ==
                        '03' ?
                        'Maret' : ($selectedMonth == '04' ? 'April' : ($selectedMonth == '05' ? 'Mei' : ($selectedMonth
                        ==
                        '06' ? 'Juni' : ($selectedMonth == '07' ? 'Juli' : ($selectedMonth == '08' ? 'Agustus' :
                        ($selectedMonth == '09' ? 'September' : ($selectedMonth == '10' ? 'Oktober' : ($selectedMonth ==
                        '11'
                        ? 'November' : 'Desember')))))))))) }}
                    </a>
                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel-laporan') }}"
                        target="_blank">Export Perbulan </a>
                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel-laporan-all') }}"
                        target="_blank">Export </a>

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
                                <th style="width: 5%;">No</th>
                                <th>Tanggal</th>
                                <th>Pegawai</th>
                                <th style="width: 30%;">Keterangan</th>
                                <th>Kas Keluar</th>
                                <th>Kas Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            $total_masuk = 0;
                            $total_keluar = 0;
                            @endphp
                            @foreach ($items as $key => $value)
                            @foreach ($value as $item)
                            @php
                            $total_masuk += $item['kas_masuk'] ?? 0;
                            $total_keluar += $item['kas_keluar'] ?? 0;
                            @endphp
                            <tr>
                                @if ($loop->first)
                                <td rowspan="{{ count($value) }}">{{ $no++ }}</td>
                                <td rowspan="{{ count($value) }}">{{ $key }}</td>
                                @endif
                                <td>{{ $item['pegawai'] }}</td>
                                <td>{{ $item['keterangan'] }}</td>
                                <td>{{ "Rp. ".number_format($item['kas_keluar']) }}</td>
                                <td>{{ "Rp. ".number_format($item['kas_masuk']) }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: center;">Total</th>
                                <th>{{ "Rp. ".number_format($total_keluar) }}</th>
                                <th>{{ "Rp. ".number_format($total_masuk) }}</th>
                            </tr>
                        </tfoot>
                    </table>


                </div>

            </div>

        </div>
    </div>
</div>