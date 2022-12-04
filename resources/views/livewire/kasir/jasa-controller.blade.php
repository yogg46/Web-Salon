<div>

    <div class="datatable-toolbar">
        <div class="field ml-2">
            <div class="control has-icons-left">
                <div class="select">
                    <select class="datatable-filter datatable-select form-control" wire:model="select">
                        <option value="1">
                            Jasa
                        </option>
                        <option value="2">
                            Kategori
                        </option>
                    </select>
                </div>
                <div class="icon is-small is-left">
                    <i class="lnil lnil-menu-circle "></i>
                </div>
            </div>
        </div>
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
            {{-- <a class="button h-button is-rounded h-modal-trigger" data-modal="add-user">Right Actions</a> --}}

        </div>

    </div>
    @include('livewire.kasir.add-kategori')
    @include('livewire.kasir.add-jasa')
    @if ($select == 1)

        <div class="table-wrapper">
            <table id="" class="table is-datatable is-hoverable table-is-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jasa</th>
                        {{-- <th>User Name</th> --}}
                        <th>Harga</th>
                        <th>Kategori</th>
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
                            {{-- <td>{{ $key->username }}</td> --}}
                            <td>Rp. {{ $key->harga }}</td>

                            <td class=" text-center">
                                <span
                                    class="tag {{ $key->role == 'admin' ? 'is-success' : 'is-info' }} is-rounded">{{ $key->jasaRelasiKategori->kategori }}</span>
                            </td>

                        </tr>
                    @endforeach

                </tbody>


            </table>



        </div>
        <nav class="w-full sm:w-auto sm:mr-auto">
            {{ $jasa->onEachSide(1)->links('layouts.pagination') }}

        </nav>
    @endif
    @if ($select == 2)
        <div class="widget creative-list-widget">
            <div class="widget-toolbar">
                <div class="left">
                    <h3>Kategori</h3>
                </div>
                <div class="right">

                </div>
            </div>

            <div class="columns is-multiline">
                @foreach ($kat as $key)
                    <div class="column is-3">
                        <div class="creative-list">
                            <div class="creative-list-item is-green">
                                <div class="h-avatar ">
                                    <span class="h-icon is-blue is-rounded text-black fw-bolder h-100">
                                        <div class="is-4  title text-capitalize is-narrow is-thin  ">
                                            {{ Str::substr($key->kategori, 0, 2) }}
                                        </div>
                                    </span>
                                </div>
                                <div class="meta is-3">
                                    <span class="title is-thin is-5">{{ $key->kategori }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    @endif

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#add-kategori').modal('hide');
                $('#add-kategori').modal('close');
                $('#add-kategori').modal('isClose');
                $('#add-kategori').modal('closeOthers');
            });
            $(document).ready(function() {
                window.livewire.emit('close');
            });

            window.livewire.on('close-modal', () => {
                $('#add-kategori').modal('close');
            });

            window.livewire.on('close-modal', () => {
                $('#add-kategori').modal('hide');
            });
            window.livewire.on('close-modal', () => {
                $('#add-kategori').modal('isClose');
            });
        </script>
    @endpush


</div>
