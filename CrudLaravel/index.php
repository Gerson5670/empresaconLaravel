<!doctype html>
<html lang="en">
  <head>
    <title>Empleados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>


      <h1>Formulario Empleados</h1>
       <div class="container">
          <form class="d-flex" action="crud_empleado.php" method="post">
            <div class="col">
              <div class="mb-3">
                <label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
                <input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="Codigo: E001" required>
              </div>
              <div class="mb-3">
                <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre1 Nombre2" required>
              </div>
              <div class="mb-3">
                <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellidos: Apellido1 Apellido2" required> 
              </div>
              <div class="mb-3">
                <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Direccion: #casa calle avenida lugar" required>
              </div>
              <div class="mb-3">
                <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono: 56688621" required>
              </div>
              <div class="mb-3">
                <label for="lbl_puesto" class="form-label"><br>Puesto</br></label>
                <select class="form-select" name="drop_puesto" id="drop_puesto">
                  <option value=0> ---- Puesto ---- </option>


                   
                  <?php 

                   include("datos_conexion.php");
                   $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                   $db_conexion -> real_query ("SELECT id_puesto as id,puesto FROM puestos;");
                  $resultado = $db_conexion -> use_result();
                  while ($fila = $resultado ->fetch_assoc()){
                    echo "<option value=". $fila['id'].">". $fila['puesto']."</option>";
                  }
                  $db_conexion ->close();
                  ?>


                  
                </select>
              </div>


              <div class="mb-3">
                <label for="lbl_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
              </div>
              <div class="mb-3">
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary " value = "Agregar">
              </div>
              <div class="mb-3">
                <input type="submit" name="btn_actualizar" id="btn_actualizar" class="btn btn-primary " value = "Actualizar">
              </div>
            </div>
            </form>


            <div class="container">
              <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                  <tr>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Puesto</th>
                    <th>Nacimiento</th>
                  </tr>
                  </thead>
                  <tbody>


                  <?php 
                   include("datos_conexion.php");
                   $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                   $db_conexion -> real_query ("SELECT e.id_empleado as id,e.codigo,e.nombres,e.apellidos,e.direccion,e.telefono,p.puesto,e.fecha_nacimiento FROM empleados as e inner join puestos as p on e.id_puesto = p.id_puesto;");
                  $resultado = $db_conexion -> use_result();
                  while ($fila = $resultado ->fetch_assoc()){
                    echo"<tr data-id=". $fila['id'] .">";
                    echo"<td>". $fila['codigo'] ."</td>";
                    echo"<td>". $fila['nombres'] ."</td>";
                    echo"<td>". $fila['apellidos'] ."</td>";
                    echo"<td>". $fila['direccion'] ."</td>";
                    echo"<td>". $fila['telefono'] ."</td>";
                    echo"<td>". $fila['puesto'] ."</td>";
                    echo"<td>". $fila['fecha_nacimiento'] ."</td>";
                    echo"<tr>";
                  }
                  $db_conexion ->close();
                  ?>
                  
                  </tbody>
              </table>
              </div>


 
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>