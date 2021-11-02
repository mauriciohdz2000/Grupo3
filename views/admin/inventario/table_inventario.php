<table class="table table-borderless table-responsive-xl">
    <thead class="bg-dark text-white cHead">
        <tr>
            <th>N°</th>
            <th>nombre</th>
            <th>Descripcion</th>
            <th>precio compra</th>
            <th>cantidad</th>
            <th>precio venta</th>
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
                <td>$<?php echo $result['precio_compra']; ?></td>
                <td><?php echo $result['cantidad']; ?> Unidades</td>
                <td> $<?php echo $result['precio_venta']; ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>