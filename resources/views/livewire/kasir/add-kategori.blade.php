<div wire:ignore.self id="add-kategori" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tambah Kategori</h3>
                <button wire:ignore class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <form  wire:submit.prevent="saveKategori()">

                <div class="inner-content">

                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field is-autocomplete">
                                <label>Kategori Jasa</label>
                                <div class="control  @error('kategori') has-validation has-error @enderror">
                                    <input wire:model.defer='kategori' class="input is-primary-focus"
                                        placeholder="Kategori Jasa *">


                                    @error('kategori')
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
                <button  wire:click.prevent="saveKategori()" type="submit" class="button h-button is-primary is-raised is-rounded">Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>


<div wire:ignore.self id="edit-kategori" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tambah Kategori</h3>
                <button wire:ignore class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <form  wire:submit.prevent="updateKategori()">

                <div class="inner-content">

                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field is-autocomplete">
                                <label>Kategori Jasa</label>
                                <div class="control  @error('kategori') has-validation has-error @enderror">
                                    <input wire:model.defer='kategori' class="input is-primary-focus"
                                        placeholder="Kategori Jasa *">


                                    @error('kategori')
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
                <button  wire:click.prevent="updateKategori()" type="submit" class="button h-button is-primary is-raised is-rounded">Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>
