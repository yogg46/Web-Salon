<div>
    @if ($select == 1)
    @include('livewire.gudang.view-rinci')
    @endif
    @if ($select == 2)
    @include('livewire.kasir.view-rinci')
    @endif
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
                            <select class="datatable-filter datatable-select form-control" wire:model="search">
                                <option data-empty="true" value="">Tanggal</option>


                                @foreach (array_unique( $tgl) as $key)





                                    <option value="{{ $key }}">{{ $key }}</option>
                                @endforeach

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
                @if ($select == 1)

                <div class="table-wrapper">
                    <table id="" class="table is-datatable is-hoverable table-is-bordered">
                        <thead>
                            <tr>
                                <th>Manufaktur</th>
                                <th>tanggal</th>
                                <th>Petugas Gudang</th>
                                <th>Suplier</th>
                                <th>Total</th>
                                <th>Rincian</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pembelian as $v)
                                <tr>
                                    <td>{{ $v->manufaktur }}</td>
                                    <td>{{ $v->tanggal }}</td>
                                    <td>{{ $v->pembelianRelasiUser->name }}</td>
                                    <td>{{ $v->pembelianRelasiSuplier->nama_suplier }}</td>
                                    <td>Rp. {{ $v->total }}</td>
                                    <td>
                                        <p class="control">
                                            <button data-modal="view-rinci1" wire:ignore.self
                                                wire:click.prevent="Rincian({{ $v->id }})"
                                                class="button h-button is-warning is-light is-raised h-modal-trigger">
                                                <span class="icon">
                                                    <i aria-hidden="true" class="lnil lnil-pencil"></i>
                                                </span>
                                                <span>Rincian</span>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                {{-- <nav class="w-full sm:w-auto sm:mr-auto"> --}}
                {{ $pembelian->onEachSide(1)->links('layouts.pagination') }}

                {{-- </nav> --}}

                @endif





            </div>

        </div>
    </div>
</div>
