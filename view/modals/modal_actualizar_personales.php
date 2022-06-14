<form id="frm_actualizar_personales" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="modal_actualizar_personales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Actualizar datos personales</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <input type="text" name="paternoI" id="paternoI" class="form-control" placeholder="Apellido Paterno">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="maternoI" id="maternoI" class="form-control" placeholder="Apellido Materno">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="nombreI" id="nombreI" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="telefonoI" id="telefonoI" class="form-control" placeholder="Telefono">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="correoI" id="correoI" class="form-control" placeholder="Correo">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" name="fechaI" id="fechaI" class="form-control" placeholder="Fecha de nacimiento">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <span id="btn_actualizar_personal" type="button" class="btn btn-primary">Actualizar</span>
        </div>
        </div>
    </div>
    </div>
</form>