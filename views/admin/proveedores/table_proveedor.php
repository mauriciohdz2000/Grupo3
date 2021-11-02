<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th>N°</th>
            <th>Nombre Del Proveedor</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th colspan="3">
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProve as $result) : ?>
            <tr class="cHead">
                <td> <?php echo $cont += 1; ?></td>
                <td> <?php echo $result['nombre']; ?></td>
                <td> <?php echo $result['direccion']; ?></td>
                <td> <?php echo $result['telefono']; ?></td>
                <td> <?php echo $result['correo']; ?></td>
                <td>
                    <a href="" class="btn btn-success upd-user" data-toggle="modal" id-user="<?php echo $result['id_proveedor']; ?>" > <i class="fas fa-user-edit"></i></a>
                </td>
                <td>
                    <a href="" class="btn btn-danger btnDrop-Proveedor exit-provee " id_proveedor="<?php echo $result['id_proveedor']; ?>"> <i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>