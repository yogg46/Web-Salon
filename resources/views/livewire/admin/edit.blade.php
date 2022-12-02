<div wire:ignore.self id="edit-user" class="modal fade h-modal " tabindex="-1" role="dialog" aria-hidden="true"
    aria-modal="true">
    <div class="modal-background h-modal-close" wire:click.prevent="resetInput()"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Edit User</h3>
                <button wire:ignore wire:click.prevent="resetInput()" class=" h-modal-close ml-auto"
                    aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                {{-- <div class="form-layout">
                    <div class="form-outer">

                        <div class="form-body"> --}}
                <!--Fieldset-->
                <form action="" wire:submit.prevent="update">

                    {{-- <div class="form-fieldset"> --}}


                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <label>Nama</label>

                                <div class="control has-icon">
                                    <input wire:model.defer='name' class="input">
                                    <div class="form-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                </div>
                                @error('name')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <label>Email</label>
                                <div class="control has-icon">
                                    <input wire:model.defer='email' type="email" class="input">
                                    <div class="form-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </div>
                                    @error('email')
                                        <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <label>Role</label>
                                <div class="control has-icon">

                                    <div class=" h-select">
                                        <select wire:model='role' class="select w-100" style="width:800px;">
                                            <option>Pilih Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                            <option value="gudang">Gudang</option>
                                            <option value="bos">Owner</option>
                                        </select>
                                    </div>


                                </div>
                                @error('role')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        {{-- <button class="button h-button is-primary is-raised">TAMBAHKAN</button> --}}
                    </div>
                </form>

                {{-- </div> --}}
                <!--Fieldset-->
                <!--Fieldset-->
                {{-- </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-card-foot is-end">
                <button wire:click.prevent="resetInput()"
                    class="button h-button is-rounded h-modal-close">Batal</button>
                <button wire:click.prevent="update()" type="button"
                    class="button h-button is-success is-raised is-rounded">Simpan</button>
            </div>

        </div>
    </div>
</div>
