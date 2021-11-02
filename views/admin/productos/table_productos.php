<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th>N°</th>
            <th>nombre</th>
            <th>Descripcion</th>
            <th>precio compra</th>
            <th>cantidad</th>
            <th>precio venta</th>
            <th colspan="4">
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataProducto as $result) : ?>
            <tr class="cHead">
                <td> <?php echo $cont += 1; ?></td>
                <td> <?php echo $result['nombre_producto']; ?></td>
                <td>
                <?php echo $result['descripcion']; ?>
                </td>
                <td>
                <?php echo $result['precio_compra']; ?>
                </td>
                <td> <?php echo $result['cantidad']; ?></td>
                <td> <?php echo $result['precio_venta']; ?></td>
                <td>
                    <a href="" class="btn btn-success upd-user" data-toggle="modal" id_user="<?php echo $result['id']; ?>" > <i class="fas fa-user-edit"></i></a>
                </td>
                <td>
                    <a href="" class="btn btn-danger btnDrop-producto exit-sys3 " id_producto="<?php echo $result['id']; ?>"> <i class="fas fa-user-times"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>