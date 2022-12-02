<div>
    @include('livewire.gudang.add-pengambilan')

    <div class="page-content-wrapper">
        <div class="page-content is-relative">

            <div class="page-title has-text-centered is-webapp">

                <div class="title-wrap">
                    <h1 class="title is-4">Data Pengambilan</h1>
                </div>


            </div>

            <div class="datatable-toolbar">

                <!-- <div class="field has-addons is-disabled">
                    <p class="control">
                        <button class="button h-button">
                            <span class="icon is-small">
                              <i aria-hidden="true" class="fas fa-check"></i>
                          </span>
                            <span>Promote</span>
                        </button>
                    </p>
                    <p class="control">
                        <button class="button h-button">
                            <span class="icon is-small">
                              <i aria-hidden="true" class="fas fa-times"></i>
                          </span>
                            <span>Delete</span>
                        </button>
                    </p>
                    <p class="control">
                        <button class="button h-button">
                            <span class="icon is-small">
                              <i aria-hidden="true" class="fas fa-arrow-right"></i>
                          </span>
                            <span>Transfer</span>
                        </button>
                    </p>
                </div> -->

                <div class="buttons">
                    <!-- <button class="button h-button is-primary is-elevated">
                        <span class="icon is-small">
                          <i aria-hidden="true" class="fas dropdown-block"></i>
                      </span>
                        <span>Unduh Format Excel</span>
                    </button> -->
                    <button class="button h-button is-primary is-elevated h-modal-trigger" data-modal="add-pengambilan">
                        <span class="icon">
                            <i aria-hidden="true" class="fas fa-plus"></i>
                        </span>
                        <span>Tambah Pengambilan</span>
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
                                <th>Tanggal</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Pengambil</th>
                                {{-- <th>Harga</th> --}}
                                {{-- <th>Jumlah</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengambilan as $s)
                                <tr>
                                    <td>{{ $s->no_pengambilan }}</td>
                                    <td>{{ $s->tanggal }}</td>
                                    <td>{{ $s->pengambilanRelasiBarang->nama_barang }}</td>
                                    <td>{{ $s->jumlah }}</td>
                                    <td>{{ $s->pengambilanRelasiUser->name }}</td>
                                    {{-- <td></td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div>

                    <nav class="w-full sm:w-auto sm:mr-auto">
                        {{ $pengambilan->onEachSide(1)->links('layouts.pagination') }}

                    </nav>
                </div>

            </div>

        </div>
    </div>



</div>
