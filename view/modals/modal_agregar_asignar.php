<!-- Modal -->
<form id="frm_agregar_asignacion">
    <div class="modal fade" id="modal_asignar_equipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignacion de Dispositivos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select name="persona" id="persona" class="form-select">
                                <option value="vacio">Personas</option>
                                <?php foreach($datosPers AS $personas):?>
                                <option value="<?= $personas['id_persona']?>"><?= $personas['nombrePersona']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="dispositivo" id="dispositivo" class="form-select">
                                <option value="">Tipo de dispositivo</option>
                                <?php foreach($datosAsig AS $asignacion):?>
                                <option value="<?= $asignacion['id_equipo']?>"><?= $asignacion['nombre']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group input-group">
                                <span class="input-group-text">Color</span>
                                <input type="color" class="form-control-color" name="color" id="color">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="5" placeholder="Descripcion"></textarea>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="memoria" id="memoria" class="form-control" placeholder="Memoria" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="disco_duro" id="disco_duro" class="form-control" placeholder="Disco Duro" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="procesador" id="procesador" class="form-control" placeholder="Procesador" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <span id="btn_agregar_asignacion" type="button" class="btn btn-primary">Asignar</span>
                </div>
            </div>
        </div>
    </div>
</form>