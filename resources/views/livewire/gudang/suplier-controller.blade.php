<div>
    @include('livewire.gudang.add-suplier')
    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-title has-text-centered is-webapp">

                <div class="title-wrap">
                    <h1 class="title is-4">Data Barang</h1>
                </div>

            </div>

            <div class="datatable-toolbar">
                <div class="field has-addons ">
                    <div class="control has-icon">
                        <input wire:model="search" class="input " placeholder="Search again...">
                        <div class="form-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>

                </div>
                <div class="buttons">

                    <button class="button h-button is-primary is-elevated h-modal-trigger" data-modal="add-suplier">
                        <span class="icon">
                            <i aria-hidden="true" class="fas fa-plus"></i>
                        </span>
                        <span>Tambah Suplier</span>
                    </button>
                </div>
            </div>

            <div class="page-content-inner is-webapp">

                <!-- Datatable -->
                <div class="table-wrapper">
                    <table id="" class="table is-datatable is-hoverable table-is-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Suplier</th>
                                <th>Alamat</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($suplier as $k)
                                <tr>
                                    <td>{{ $k->no_suplier }}</td>
                                    <td>{{ $k->nama_suplier }}</td>
                                    <td>{{ $k->alamat }}</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <nav class="w-full sm:w-auto sm:mr-auto">
                    {{ $suplier->onEachSide(1)->links('layouts.pagination') }}

                </nav>

            </div>

        </div>
    </div>

</div>
