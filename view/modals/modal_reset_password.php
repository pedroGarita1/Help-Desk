<form id="frm_reset_password">
<!-- Modal -->
    <div class="modal fade" id="modal_reset_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Resetear password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <input type="hidden" name="idUsuario_pass" id="idUsuario_pass">
        <div class="modal-body">
            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <span id="btn_reset_password" type="button" class="btn btn-primary">Cambiar</span>
        </div>
        </div>
    </div>
    </div>
</form>