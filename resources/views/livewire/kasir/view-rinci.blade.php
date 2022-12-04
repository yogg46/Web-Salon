<div id="view-rinci2" class="modal fade h-modal is-large " tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-background h-modal-close "></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>Rincian Pemasukan Tanggal {{ $rinci2->tanggal }}


                </h3>
                <h4> </h4>
                <button wire:ignore class=" h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body has-slimscroll">
                {{-- <div class="demo-title">
                    <h3 class="title is-thin is-5"></h3>
                    <p>Huro also features classic Bulma cards, but with a particular Huro flavour. Simply
                        add the <code>h-card</code> class to a Bulma <code>card</code> element to leverage
                        the styles provided by Huro.
                    </p>
                </div> --}}
                <table class="table is-hoverable is-fullwidth">
                    <tbody>
                        <tr>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th class="">
                                <div class="dark-inverted">
                                    Subtotal
                                </div>
                            </th>
                        </tr>
                        @foreach ($rinci2->layananRelasiDetail as $p)
                            <tr>
                                <td>{{ $p->detailRelasiJasa->nama_jasa }}</td>
                                <td>Rp. {{ $p->harga }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td class="is-end text-end">
                                    Rp. {{ $p->subtotal }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <th>Total</th>
                            <td class="is-end">
                                Rp. {{ $rinci2->total }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-card-foot is-end">

                <button type="button"
                    class="button h-button is-success is-raised h-modal-close is-rounded">Tutup</button>
            </div>

        </div>
    </div>
</div>
