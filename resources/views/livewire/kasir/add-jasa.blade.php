<div wire:ignore.self id="add-jasa" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tambah Jasa</h3>
                <button wire:ignore class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <form  wire:submit.prevent="saveJasa()">

                <div class="inner-content">

                    <div class="columns is-multiline">
                        <div class="column is-4">

                            <div class="field is-autocomplete">

                                <label>Nama Jasa</label>
                                <div class="control  @error('nama_jasa') has-validation has-error @enderror">
                                    <input wire:model.defer='nama_jasa' class="input is-primary-focus"
                                        placeholder="Nama Jasa *">
                                    @error('nama_jasa')
                                        <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="field is-autocomplete">
                                <label>Kategori </label>

                                <div class="control  @error('kategori_id') has-validation has-error @enderror">

                                    <div class=" h-select">
                                        <select wire:ignore.self wire:model='kategori_id' class="select w-100"
                                            style="width:800px;">
                                            <option>Pilih Kategori</option>
                                            @foreach ($kat as $ke)
                                                <option value="{{ $ke->id }}">{{ $ke->kategori }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @error('kategori_id')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="column is-4">

                            <div class="field is-autocomplete">

                                <label>Harga </label>
                                <div class="control  @error('harga') has-validation has-error @enderror">
                                    <input wire:model.defer='harga' type="number" min="1" class="input is-primary-focus"
                                        placeholder="Harga *">
                                    @error('harga')
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
                <button  wire:click.prevent="saveJasa()" type="submit" class="button h-button is-primary is-raised is-rounded">Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>




<div wire:ignore.self id="edit-jasa" class="modal h-modal">
    <div class="modal-background  h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Tambah Jasa</h3>
                <button wire:ignore class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <form  wire:submit.prevent="updateJasa()">

                <div class="inner-content">

                    <div class="columns is-multiline">
                        <div class="column is-4">

                            <div class="field is-autocomplete">

                                <label>Nama Jasa</label>
                                <div class="control  @error('nama_jasa') has-validation has-error @enderror">
                                    <input wire:model.defer='nama_jasa' class="input is-primary-focus"
                                        placeholder="Nama Jasa *">
                                    @error('nama_jasa')
                                        <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="field is-autocomplete">
                                <label>Kategori </label>

                                <div class="control  @error('kategori_id') has-validation has-error @enderror">

                                    <div class=" h-select">
                                        <select wire:ignore.self wire:model='kategori_id' class="select w-100"
                                            style="width:800px;">
                                            <option>Pilih Kategori</option>
                                            @foreach ($kat as $ke)
                                                <option value="{{ $ke->id }}" {{ $ke->id == $kategori_id ? 'selected':'' }}>{{ $ke->kategori }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @error('kategori_id')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="column is-4">

                            <div class="field is-autocomplete">

                                <label>Harga </label>
                                <div class="control  @error('harga') has-validation has-error @enderror">
                                    <input wire:model.defer='harga' type="number" min="1" class="input is-primary-focus"
                                        placeholder="Harga *">
                                    @error('harga')
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
                <button  wire:click.prevent="updateJasa()" type="submit" class="button h-button is-primary is-raised is-rounded">Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>

