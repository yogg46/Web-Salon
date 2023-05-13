<div>

    <div class="datatable-toolbar">



        <div class="field ml-2">
            <div class="control has-icons-left">
                <div class="select">
                    <select class="datatable-filter datatable-select form-control" wire:model="select2">
                        <option data-empty="true" value="">Kategori</option>
                        @foreach ($kat as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->kategori }}
                        </option>
                        @endforeach



                    </select>
                </div>
                <div class="icon is-small is-left">
                    <i class="lnil lnil-timer"></i>
                </div>
            </div>
        </div>


        <div class="buttons">

            <a class="button h-button is-primary is-elevated   h-modal-trigger" data-modal="add-kategori">
                <span class="icon">
                    <i aria-hidden="true" class="fas fa-plus"></i>
                </span>
                <span>
                    Add Kategori
                </span>
            </a>


            <a class="button h-button is-primary is-elevated  h-modal-trigger" wire:modal="isopen()"
                data-modal="add-jasa">
                <span class="icon">
                    <i aria-hidden="true" class="fas fa-plus"></i>
                </span>
                <span>
                    Add Jasa
                </span>
            </a>


        </div>

    </div>
    @include('livewire.kasir.add-kategori')
    @include('livewire.kasir.add-jasa')

    <div class="columns is-multiline">
        <div class="column is-9">


            <div class="table-wrapper">
                <table id="" class="table is-datatable is-hoverable table-is-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jasa</th>

                            <th>Harga</th>
                            <th class=" text-center">Kategori</th>
                            <th class=" text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $no = ($jasa->currentpage() - 1) * $jasa->perpage() + 1;

                        @endphp
                        @foreach ($jasa as $key)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $key->nama_jasa }}</td>

                            <td>Rp. {{ $key->harga }}</td>

                            <td class=" text-center">
                                <span class="tag {{ $key->role == 'admin' ? 'is-success' : 'is-info' }} is-rounded">{{
                                    $key->jasaRelasiKategori->kategori }}</span>
                            </td>
                            <td class=" text-center">
                                <button wire:click='editJasa({{ $key->id }})'
                                    class="button   is-warning is-light  is-circle is-elevated is-bordered h-modal-trigger"
                                    data-modal="edit-jasa">
                                    <span class="icon is-small">
                                        <i class="lnil lnil-pencil"></i>
                                    </span>
                                </button>
                                <button wire:click='konJasa({{ $key->id }})'
                                    class="button is-danger is-light is-circle is-elevated is-bordered h-modal-trigger">
                                    <span class="icon is-small">
                                        <i class="lnil lnil-trash-can-alt"></i>
                                    </span>
                                </button>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>


                </table>



            </div>
            <nav class="w-full sm:w-auto sm:mr-auto">
                {{ $jasa->onEachSide(1)->links('layouts.pagination') }}

            </nav>
        </div>


        <div class="column is-3">

            <div class="widget creative-list-widget">



                @foreach ($kat as $key)

                <div class="creative-list">
                    <div class="media-flex-center creative-list-item is-green flex justify-content-between  ">

                        <div class="meta is-3">
                            <span class="title is-thin is-5">{{ $key->kategori }}</span>
                        </div>
                        <div class="flex-end">
                            <button wire:click='editKategori({{ $key->id }})'
                                class="button   is-warning is-light  is-circle is-elevated is-bordered h-modal-trigger"
                                data-modal="edit-kategori">
                                <span class="icon is-small">
                                    <i class="lnil lnil-pencil"></i>
                                </span>
                            </button>
                            <button  wire:click='konKategori({{ $key->id }})' class="button is-danger is-light is-circle is-elevated is-bordered h-modal-trigger">
                                <span class="icon is-small">
                                    <i class="lnil lnil-trash-can-alt"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach


            </div>

        </div>

    </div>




    @push('scripts')
    <script>
        window.addEventListener('swal:confirmJasa', event => {
                swal.fire({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        showCancelButton: true,
                        reverseButtons: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('deleteJasa', event.detail.id);
                        }
                    });
            });
        window.addEventListener('swal:confirmKategori', event => {
                swal.fire({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        showCancelButton: true,
                        reverseButtons: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('deleteKategori', event.detail.id);
                        }
                    });
            });

        document.addEventListener('livewire:load', function () {
                Livewire.on('closeModal', function () {
                    $('#add-kategori').modal('hide');
                });
            });


    </script>
    @endpush

</div>
