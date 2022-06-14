<form id="frm_solucion_admin" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="modal_solucionA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Soluciones</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="idReporte" id="idReporte">
            <textarea class="form-control mb-3" id="solucion" name="solucion" rows="6" placeholder="Escribe la solucion"></textarea>
            <select name="estatus" id="estatus" class="form-select">
                <option value="1">Abierto</option>
                <option value="0">Cerrado</option>
            </select>
        </div>
        <div class="modal-footer">
            <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
            <span id="btn_agregar_solucion" class="btn btn-primary">Guardar</span>
        </div>
        </div>
    </div>
    </div>
</form>