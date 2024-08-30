<title><?= $titulo ?></title>
<br>
<div class="container-fluid">
    <div id="demo" class="">
        <div class="">
            <h3 class=""><?= $titulo ?> 
                <a href="<?= site_url('AlumnosController/form') ?>">
                    <button title="Nuevo" class="btn btn-primary">
                        <i class="fa fa-plus-square-o">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </i> 
                        Nuevo
                    </button>
                </a>
            </h3>
        </div>
        <!-- /.box-header -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th> <!-- Column for buttons -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($resultados as $row): ?>
					<tr>
						<td><?= $row->alumno; ?></td>
						<td><?= $row->nombre . ' ' . $row->apellido; ?></td>
						<td><?= $row->direccion; ?></td>
						<td><?= $row->movil; ?></td>
						<td><?= $row->email; ?></td>
						<td><?= $row->fecha_creacion; ?></td>
						<td><?= $row->user; ?></td>
						<td><?php if($row->inactivo == 0) { echo "Activo"; } else { echo "Inactivo"; } ?></td>
						<td class="text-center">
                            <!-- Update Button -->
                            <a href="<?= site_url('AlumnosController/form/' . $row->alumno) ?>">
                                <button title="Actualizar" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> 
                                    <ion-icon name="create-outline"></ion-icon>
                                    Actualizar
                                </button>
                            </a>
                            <!-- Delete Button -->
                            <a href="#" class="delete-link" data-url="<?= site_url('AlumnosController/delete/' . $row->alumno) ?>">
    <button title="Eliminar" class="btn btn-danger btn-sm">
        <i class="fa fa-trash-o"></i> 
        <ion-icon name="trash-outline"></ion-icon>
        Eliminar
    </button>
</a>



                            
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th> <!-- Column for buttons -->
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->