<div>

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
        <div class="field ml-2">
            <div class="control has-icons-left">
                <div class="select">
                    <select class="datatable-filter datatable-select form-control" wire:model="select">
                        <option data-empty="true" value="">Role</option>
                        <option value="admin">
                            Admin
                        </option>
                        <option value="kasir">
                            Kasir
                        </option>
                        <option value="gudang">
                            Pegawai Gudang
                        </option>
                        <option value="bos">
                            Pemilik Salon
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
                        <option data-empty="true" value="">Status</option>
                        <option value="aktif">
                            Aktif
                        </option>
                        <option value="tidak">
                            Tidak Aktif
                        </option>

                    </select>
                </div>
                <div class="icon is-small is-left">
                    <i class="lnil lnil-timer"></i>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="select">
            <span class="loader"></span>

        </div>

        <div class="buttons">
            <a class="button h-button is-primary is-elevated  h-modal-trigger" data-modal="add-user">
                <span class="icon">
                    <i aria-hidden="true" class="fas fa-plus"></i>
                </span>
                <span>
                    Add User
                </span>
            </a>
            {{-- <a class="button h-button is-rounded h-modal-trigger" data-modal="add-user">Right Actions</a> --}}

        </div>
    </div>
    @include('livewire.admin.add')
    @include('livewire.admin.edit')

    <div class="table-wrapper">
        <table id="" class="table is-datatable is-hoverable table-is-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    {{-- <th>User Name</th> --}}
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @php
                    $no = ($user->currentpage() - 1) * $user->perpage() + 1;

                @endphp
                @foreach ($user as $key)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $key->name }}</td>
                        {{-- <td>{{ $key->username }}</td> --}}
                        <td>{{ $key->email }}</td>

                        <td class=" text-center">
                            <span
                                class="tag {{ $key->role == 'admin' ? 'is-success' : 'is-info' }} is-rounded">{{ $key->role == 'bos' ? 'Owner' : ($key->role == 'gudang' ? 'Pegawai Gudang' : ($key->role == 'admin' ? 'Admin' : 'Kasir')) }}</span>
                        </td>
                        <td class=" text-center">
                            <span class="tag {{ $key->status == 'aktif' ? 'is-success' : 'is-danger' }}  is-rounded"
                                style="text-transform: capitalize;">{{ $key->status == 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>


                        <td>
                            <div class="field has-addons">
                                <p class="control">

                                    <button data-modal="edit-user" wire:click.prevent="edit({{ $key->id }})"
                                        class="button h-button is-warning is-light is-raised h-modal-trigger">
                                        <span class="icon">
                                            <i aria-hidden="true" class="lnil lnil-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </button>
                                </p>
                                <p class="control">

                                    <button wire:click.prevent="konfimasiReset({{ $key->id }})"
                                        class="button h-button is-info is-light is-raised">
                                        <span class="icon">
                                            <i aria-hidden="true" class="lnil lnil-reload"></i>
                                        </span>
                                        <span>Reset</span>
                                    </button>
                                </p>
                                <p class="control">

                                    <button wire:click.prevent="konfimasiDEL({{ $key->id }})"
                                        class="button h-button is-danger is-light is-raised">
                                        <span class="icon">
                                            <i class="lnil lnil-trash"></i>
                                        </span>
                                        <span>Delete</span>
                                    </button>
                                </p>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>


        </table>



    </div>
    <nav class="w-full sm:w-auto sm:mr-auto">
        {{ $user->onEachSide(1)->links('layouts.pagination') }}

    </nav>
    {{-- <div class="pagination datatable-pagination">

        <div class="datatable-info">
            <span></span>
        </div>
    </div> --}}

    @push('js')
        <script>
            // window.addEventListener('closeModal', event => {
            //         $("#add-user").modal('hide');
            //     })
            window.addEventListener('closeModal', event => {
                $("#add-user").closest(".modal").removeClass("is-active");
            })

            window.livewire.on('closeModal', () => {
                    $("#add-user").closest(".modal").removeClass("is-active");
                }) <
                script >
            @endpush <
            /div>
