<div>

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
                            <select wire:model="selectedYear" class="datatable-filter datatable-select form-control"
                                id="year">
                                <option value="">Semua Tahun</option>
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

                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel-pengeluaran-lain') }}"
                        target="_blank">Export Excel Perbulan </a>
                    <a class="button h-button is-success  is-elevated" href="{{ route('export-excel-pengeluaran-lain-all') }}"
                        target="_blank">Export Excel</a>
                    <a class="button h-button is-primary  is-elevated h-modal-trigger" data-modal="add-pengeluaran"
                        target="_blank">Tambah Pengeluaran </a>

                </div>



            </div>

            <div class="page-content-inner is-webapp">

                <!-- Datatable -->


                <div class="table-wrapper">
                    <table id="" class="table is-datatable is-hoverable table-is-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>Manufaktur</th> --}}
                                <th>tanggal</th>
                                <th>Keterangan</th>
                                <th>Kasir</th>
                                <th>Subtotal</th>


                            </tr>
                        </thead>
                        @php
                        $no =1;
                        @endphp
                        <tbody>
                            @foreach ($pembelian as $v)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $v->tanggal->format('d-m-Y') }}
                                </td>
                                <td>
                                    {{ $v->keterangan }}
                                </td>
                                <td>
                                    {{ $v->kasir->name }}
                                </td>
                                <td>
                                    {{ 'Rp. '. number_format($v->total, 0, ',', '.') }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                        <tfoot>
                            <th colspan="3">

                            </th>
                            <th>Total</th>
                            <th>{{'Rp. '. number_format($pembelian->sum('total'), 0, ',', '.') }}</th>
                        </tfoot>
                    </table>

                </div>



            </div>

        </div>
    </div>

    <div wire:ignore.self id="add-pengeluaran" class="modal h-modal">
        <div class="modal-background  h-modal-close"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <h3>Tambah Pengeluaran Lain</h3>
                    <button wire:ignore class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </button>
                </header>
                <div class="modal-card-body">
                    <form wire:submit.prevent="simpan()">

                        <div class="inner-content">

                            <div class="columns is-multiline">
                                <div class="column is-8">

                                    <div class="field is-autocomplete">

                                        <label>Keterangan </label>
                                        <div class="control  @error('keterangan') has-validation has-error @enderror">
                                            <input wire:model='keterangan' class="input is-primary-focus"
                                                placeholder="Keterangan *">
                                            @error('keterangan')
                                            <span class="error  text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="column is-4">

                                    <div class="field is-autocomplete">

                                        <label>Total </label>
                                        <div class="control  @error('total') has-validation has-error @enderror">
                                            <input wire:model='total' type="number" min="1"
                                                class="input is-primary-focus" placeholder="Total *">
                                            @error('total')
                                            <span class="error  text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                </div>
                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Batal</a>
                    <button wire:click.prevent="simpan()" type="submit"
                        class="button h-button is-primary is-raised is-rounded">Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
