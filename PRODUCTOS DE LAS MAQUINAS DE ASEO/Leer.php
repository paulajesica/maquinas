<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new maquinas();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('CODIGO',              $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
			$alm->__SET('CODIGO',          	   $_REQUEST['CODIGO']);
            $alm->__SET('NOMBREMAQUINA',          $_REQUEST['NOMBREMAQUINA']);
            $alm->__SET('PRECIO',        $_REQUEST['PRECIO']);
            

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['CODIGO']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['CODIGO']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body,td,th {
	font-size: 2pc;
}
        </style>
<meta charset="utf-8">
    </head>
    <body ><div class="pure-g">
        <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                        	<th align="right" >CODIGO</th>
                            <th >NOMBREMAQUINA</th>
                            <th >PRECIO</th>
                           
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                        	<td><?php echo $r->__GET('CODIGO'); ?></td>
                            <td><?php echo $r->__GET('NOMBREMAQUINA'); ?></td>
                            <td><?php echo $r->__GET('PRECIO'); ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>
        <p align="right" >&nbsp;
        </p>
        <form name="form1" method="post" action="">
          <a href="../tecnivolt/insertar.html">comprar</a>
        </form>
        <p>
       
        </p>
</body>
</html>



