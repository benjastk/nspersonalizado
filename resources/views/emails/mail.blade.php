
<h1>Nuevo contacto desde formulario web - nspersonalizado.cl</h1>
<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 50%;"><strong>Nombre</strong></td>
            <td style="width: 50%; ">{{ $details->nombre }}</td>
        </tr>
        <tr>
            <td style="width: 50%;"><strong>Correo</strong></td>
            <td style="width: 50%; ">{{ $details->email }}</td>
        </tr>
        <tr>
            <td style="width: 50%;"><strong>Telefono</strong></td>
            <td style="width: 50%; ">{{ $details->telefono }}</td>
        </tr>
        <tr>
            <td style="width: 50%;"><strong>Mensaje</strong></td>
            <td style="width: 50%; ">{{ $details->mensaje }}</td>
        </tr>
        <tr>
            <td style="width: 50%;">Created at</td>
            <td style="width: 50%; ">{{ $details->created_at }}</td>
        </tr>
    </tbody>
</table>
