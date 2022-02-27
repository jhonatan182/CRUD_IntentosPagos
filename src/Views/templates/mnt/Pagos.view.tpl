<h1>Listado de Pagos</h1>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Fecha Vencimiento</th>
            <th>Estado</th>
            <th>
                <a href="index.php?page=mnt.intentospagos.pago&mode=INS&catid=0">Nuevo</a>
            </th>
        </tr>
    </thead>

    <tbody>
        {{foreach pagos}}
            <tr>
                <td>{{id}}</td>
                <td>{{fecha}}</td>
                <td>{{cliente}}</td>
                <td>{{monto}}</td>
                <td>{{fechaVencimiento}}</td>
                <td>{{estado}}</td>
                <td>
                    <a href="index.php?page=mnt.intentospagos.pago&mode=UPD&id={{id}}">Editar</a>
                    &nbsp;
                    <a href="index.php?page=mnt.intentospagos.pago&mode=DEL&id={{id}}">Eliminar</a>
                </td>
            </tr>
        {{endfor pagos}}

    </tbody>
</table>