<title><?= $titulo ?></title>
<br>
<div class="container-fluid">
    <div id="demo" class="">
        <div class="">
            <h3 class=""><?= $titulo ?> <a href="<?= site_url('AlumnosController/form') ?>"><button title="Nuevo" class="btn btn-primary"><i class="fa  fa-plus-square-o"><ion-icon name="person-add-outline"></ion-icon></i> Nuevo</button></a></h3>
        </div>
        <!-- /.box-header -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($resultados as $row): ?>
					<tr>
						<td><?= $row->alumno; ?>	</td>
						<td><?= $row->nombre.' '.$row->apellido; ?></td>
						<td><?= $row->direccion; ?>	</td>
						<td><?= $row->movil; ?></td>
						<td><?= $row->email;?></td>
						<td><?= $row->fecha_creacion; ?></td>
						<td><?= $row->user; ?></td>
						<td><?php if($row->inactivo == 0){ echo "Activo"; }else{ echo "Inactivo"; } ?></td>
						<td class="text-center">
							<a href="<?= site_url('AlumnosController/edit/'.$row->alumno); ?>" class="btn btn-warning btn-sm" title="Editar">
								<i class="fa fa-pencil"></i> Editar
							</a>
							<a href="<?= site_url('AlumnosController/delete/'.$row->alumno); ?>" class="btn btn-danger btn-sm" title="Borrar" onclick="return confirm('¿Estás seguro de que quieres eliminar este alumno?');">
								<i class="fa fa-trash"></i> Borrar
							</a>
						</td>
					</tr>
				<?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Fecha Creación</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /.box -->

<script>
