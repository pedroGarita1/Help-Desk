<!-- Modal -->
<form id="frm_agregar_usuario" method="POST">
    <div class="modal fade" id="agregar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="paterno" id="paterno" class="form-control mb-3" placeholder="Paterno" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="materno" id="materno" class="form-control mb-3" placeholder="Materno" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nombre" id="nombre" class="form-control mb-3" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control mb-3" required>
                        </div>
                        <div class="col-md-4">
                            <select name="sexo" id="sexo" class="form-select">
                                <option value="vacio">Sexo</option>
                                <option value="M">Hombre</option>
                                <option value="F">Mujer</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="telefono" id="telefono" class="form-control mb-3" placeholder="Teléfono" required>
                        </div>
                        <div class="col-md-4">
                            <input type="email" name="correo" id="correo" class="form-control mb-3" placeholder="Correo" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="usuario" id="usuario" class="form-control mb-3" placeholder="Usuario" required>
                        </div>
                        <div class="col-md-4">
                            <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password" required>
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <select name="rol_usuario" id="rol_usuario" class="form-select">
                                <option value="vacio">Rol Usuario</option>
                                <option value="1">Cliente</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" id="ubicacion" name="ubicacion" rows="3" placeholder="Describir ubicacion - Oficina, Piso, Cuarto, Dirección, etc..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                    <span class="btn btn-primary" id="btn_agregar_usuario">Agregar</span>
                </div>
            </div>
        </div>
    </div>
</form>
