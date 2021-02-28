<form wire:submit.prevent="delete">
    <div
    wire:ignore.self
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="modal_delete_siswa"
    aria-labelledby="modal_delete_siswa_label"
    aria-hidden="true"
    data-animation="flip"
    {{-- data-plugin="custommodal"
    data-overlayColor="#xxx" --}}
    style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_delete_siswa_label">Hapus Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus data siswa <strong>{{ $nama }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button wire:click="cancel" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, hapus</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
