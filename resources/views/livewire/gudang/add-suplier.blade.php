<div id="add-suplier" class="modal fade h-modal  " tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tambah Suplier </h3>
                <button wire:ignore wire:click.prevent="resetInput()" class=" h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <form>
                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <label>Nama</label>

                                <div class="control has-icon @error('nama_suplier') has-validation has-error @enderror">
                                    <input wire:model='nama_suplier' class="input is-primary-focus  "
                                        placeholder="Nama Suplier *">
                                    <div class="form-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>

                                </div>
                                @error('nama_suplier')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="column is-12">
                            <div class="field">
                                <label>Alamat</label>
                                <div class="control has-icon @error('alamat') has-validation has-error @enderror">
                                    <textarea wire:model='alamat' class="input is-primary-focus" placeholder="Alamat Suplier *">
                                    </textarea>
                                    <div class="form-icon">
                                        <i aria-hidden="true" class="lnil lnil-home"></i>
                                    </div>
                                    @error('alamat')
                                        <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                    </div>
                </form>

            </div>
            <div class="modal-card-foot is-end">
                <button wire:click.prevent="resetInput()"
                    class="button h-button is-rounded h-modal-close">Batal</button>
                <button wire:click.prevent="save()" type="button"
                    class="button h-button is-success is-raised is-rounded">Simpan</button>
            </div>

        </div>
    </div>
</div>
