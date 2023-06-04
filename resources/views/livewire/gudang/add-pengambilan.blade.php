<div id="add-pengambilan" class="modal fade h-modal  is-big " tabindex="-1" role="dialog" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3> Pengambilan Barang  </h3>

                <button wire:ignore wire:click.prevent="resetInput()" class=" h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body has-slimscroll">
                <form wire:submit.prevent="store()">

                    <div class="columns is-multiline">
                        <div class="column is-12">
                            <div class="field">
                                <label>Pengambil </label>

                                <div class="control  @error('user_id') has-validation has-error @enderror">

                                    <div class=" h-select">
                                        <select wire:ignore.self wire:model='user_id' class="select w-100"
                                            style="width:800px;">
                                            <option value="">Pilih Pengambil</option>
                                            @foreach ($pilSup as $ke)
                                            <option value="{{ $ke->id }}">{{ $ke->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                @error('user_id')
                                <span class="error  text-danger">{{ $message }}</span>
                                @enderror

                                {{-- <div class="control  @error('nama_suplier') has-validation has-error @enderror">
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
                                @enderror --}}
                            </div>
                        </div>


                        <div class="column is-6">
                            <div class="field is-autocomplete">
                                <label>Barang</label>
                                <div class="control  @error('barang_id.0') has-validation has-error @enderror">
                                    <div class=" h-select">
                                        <select wire:ignore.self wire:model='barang_id.0' class="select w-100"
                                            style="width:800px;" required>
                                            <option value="">Pilih Barang</option>
                                            @foreach ($pilBarang as $ke)
                                            <option value="{{ $ke->id }}">
                                                {{ $ke->nama_barang . ' ( Stock ' . $ke->stock . ' )' }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    @error('barang_id.0')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="column is-6">
                            <div class="field">
                                <label>Jumlah</label>
                                <div class="control  @error('jumlah.0') has-validation has-error @enderror">
                                    <input type="number" wire:model='jumlah.0' class="input is-primary-focus"
                                        placeholder="jumlah *  ">


                                    @error('jumlah.0')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror


                                </div>

                            </div>
                        </div>

                        {{-- @php
                        $total = 0;
                        @endphp --}}
                        @foreach ($inputs as $key => $value)
                        <div class="column is-6">
                            <div class="field">
                                <label>Barang</label>
                                <div
                                    class="control  @error('barang_id.{{ $value }}') has-validation has-error @enderror">
                                    <select wire:ignore.self wire:model='barang_id.{{ $value }}' class="select w-100"
                                        style="width:800px;" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($pilBarang as $ke)
                                        <option value="{{ $ke->id }}">
                                            {{ $ke->nama_barang . ' ( Stock ' . $ke->stock . ' )' }}</option>
                                        @endforeach

                                    </select>


                                    @error('barang_id.'.$value)
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="field">
                                <label>Jumlah</label>
                                <div class="control  @error('jumlah.{{ $value }}') has-validation has-error @enderror">
                                    <input type="number" wire:model='jumlah.{{ $value }}' class="input is-primary-focus"
                                        placeholder="Jumlah *" required>


                                    @error('jumlah.'.$value)
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror


                                </div>

                            </div>
                        </div>

                        <div class="column is-2">
                            <div class="field">
                                <label>hapus </label>
                                <div class="control ">
                                    <a wire:click.prevent="remove({{ $key }})" class="button h-button
                                            is-outlined is-danger is-raised">
                                        X</a>
                                </div>
                            </div>
                        </div>

                        {{-- {{ $total = array_sum($jumlah) }} --}}
                        @endforeach
                        <div class="column is-12">
                            <div class="field">
                                <div class="control">
                                    <a class="button h-button is-fullwidth  is-outlined is-primary is-raised"
                                        wire:click.prevent="add({{ $i }})">
                                        <span class="icon">
                                            <i aria-hidden="true" class="fas fa-plus"></i>
                                        </span>
                                        <span>Tambah Barang</span>
                                    </a>
                                </div>
                            </div>
                        </div>




                    </div>

                </form>
            </div>
            <div class="modal-card-foot is-end">
                <button wire:click.prevent="resetInput()"
                    class="button h-button is-rounded h-modal-close">Batal</button>
                <button wire:click.prevent="store()" type="button"
                    class="button h-button is-success is-raised is-rounded">Simpan</button>
            </div>

        </div>
    </div>
</div>
