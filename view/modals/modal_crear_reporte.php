<form id="frm_agregar_reporteC" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="modal_reportes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Reportes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <select name="dispositivo" id="dispositivo" class="form-select mb-3" required>
                        <option value="">Seleccionar Dispositivo / otro</option>
                        <?php foreach($select AS $mostrar):?>
                        <option value="<?= $mostrar['idEquipo']?>"><?= $mostrar['nombreEquipo']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" id="problema" name="problema" rows="6" placeholder="Describe tu Problema" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <span id="btn_agregar_reportes" type="button" class="btn btn-primary">Crear</span>
        </div>
        </div>
    </div>
    </div>
</form>