<form id="frm_actualizar_usuario" method="POST">
    <div class="modal fade" id="actualizar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idUsuario" id="idUsuario">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="paternou" id="paternou" class="form-control mb-3" placeholder="Paterno" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="maternou" id="maternou" class="form-control mb-3" placeholder="Materno" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nombreu" id="nombreu" class="form-control mb-3" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="fecha_nacimientou" id="fecha_nacimientou" class="form-control mb-3" required>
                        </div>
                        <div class="col-md-4">
                            <select name="sexou" id="sexou" class="form-select">
                                <option value="vacio">Sexo</option>
                                <option value="M">Hombre</option>
                                <option value="F">Mujer</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="telefonou" id="telefonou" class="form-control mb-3" placeholder="Teléfono" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="correou" id="correou" class="form-control mb-3" placeholder="Correo" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="usuariou" id="usuariou" class="form-control mb-3" placeholder="Usuario" required>
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <select name="rol_usuariou" id="rol_usuariou" class="form-select">
                                <option value="vacio">Rol Usuario</option>
                                <option value="1">Cliente</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" id="ubicacionu" name="ubicacionu" rows="3" placeholder="Describir ubicacion - Oficina, Piso, Cuarto, Dirección, etc..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                    <span class="btn btn-warning" id="btn_actualizar_usuario">Actualizar</span>
                </div>
            </div>
        </div>
    </div>
</form>
