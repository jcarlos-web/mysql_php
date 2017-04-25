<?php
include '../controllers/usuario_controller.php';
include 'head/head.php';
?>
<section class="container">
<br>
    <header>
      <h1>Listado de Usuario</h1>
      <br>
    </header>
    <nav>
      <!-- Aquí pondre el ménu-->
    </nav>
        <section class="row">
          <div class="col-lg-12">
            <form class="form-horizontal" action="index.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar..." name="search">
              </div>
            </form>
            <br>
              <?php if(!empty($message)) { ?>
                <div class="alert alert-info">
                      <h4><center><?php echo $message; ?></center></h4>
                </div>
                <br>
              <?php } ?>
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th colspan="2">Acción</ht>
                      <th>Nombre</th>
                      <th>Apellido paterno</th>
                      <th>Apellido materno</th>
                      <th>Usuario</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($enlaces)){ foreach($enlaces as $key => $value): ?>
                      <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><a href="index.php?query=<?php echo $value['id']; ?>" role="button" class="btn btn-warning btn-sm"> Editar</a></td>
                        <td><a href="index.php?_query=<?php echo $value['id']; ?>" role="button" class="btn btn-danger btn-sm"> Eliminar</a></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['ap_pat']; ?></td>
                        <td><?php echo $value['ap_mat']; ?></td>
                        <td><?php echo $value['usu']; ?></td>
                        <td><?php echo $value['pw']; ?></td>
                      </tr>
                    <?php endforeach; } else { ?>
                      <tr><td colspan="8"><center><h3>Tabla vacia<h3></center></td></tr>
                    <?php } ?>
                  </tbody>
              </table>
            </div>

          </div>
        </section>
        <section class="row">

<!-- Formulario para crear Usuario-->
            <div class="col-lg-4">
              <h3>Nuevo usuario</h3>
              <form class="form-horizontal" action="index.php" method="post">
                <input type="hidden" name="action" value="true">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" placeholder="Ingrese nombre" type="text" name="nombre" id="nombre" value="">
                  </div>
                  <div class="form-group">
                    <label for="ap_pat">Apellido paterno:</label>
                    <input class="form-control" placeholder="Ingrese apellido paterno" type="text" name="ap_pat" id="ap_pat" value="">
                  </div>
                  <div class="form-group">
                    <label for="ap_mat">Apellido materno:</label>
                    <input class="form-control" placeholder="Ingrese apellido materno" type="text" name="ap_mat" id="ap_mat" value="">
                  </div>
                  <div class="form-group">
                    <label for="usu">Usuario:</label>
                    <input class="form-control" placeholder="Ingrese usuario" type="text" name="usu" id="usu" value="">
                  </div>
                  <div class="form-group">
                    <label for="pw">Password:</label>
                    <input class="form-control" placeholder="Ingrese password" type="text" name="pw" id="pw" value="">
                  </div>

                  <input type="submit" class="btn btn-primary btn-block" value="Crear">

              </form>
            </div>

            <div class="col-lg-4"></div>


<!-- Formulario para Editar Usuario-->
            <div class="col-lg-4">
              <?php if(!empty($enlace)){ ?>
                <h3>Editar usuario</h3>
                <form class="form-horizontal" action="index.php" method="post">
                  <input type="hidden" name="action" value="true">
                    <div class="form-group">
                      <input class="form-control" placeholder="Ingrese nombre" type="hidden" name="id" id="id" value="<?php echo $enlace['id']; ?>'">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input class="form-control" placeholder="Ingrese nombre" type="text" name="nombre" id="nombre" value="<?php echo $enlace['nombre']; ?>'">
                    </div>
                    <div class="form-group">
                      <label for="ap_pat">Apellido paterno:</label>
                      <input class="form-control" placeholder="Ingrese apellido paterno" type="text" name="ap_pat" id="ap_pat" value="<?php echo $enlace['ap_pat']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="ap_mat">Apellido materno:</label>
                      <input class="form-control" placeholder="Ingrese apellido materno" type="text" name="ap_mat" id="ap_mat" value="<?php echo $enlace['ap_mat']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usu">Usuario:</label>
                      <input class="form-control" placeholder="Ingrese usuario" type="text" name="usu" id="usu" value="<?php echo $enlace['usu']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="pw">Password:</label>
                      <input class="form-control" placeholder="Ingrese password" type="text" name="pw" id="pw" value="<?php echo $enlace['pw']; ?>">
                    </div>
                    <input type="submit" class="btn btn-warning btn-block" value="Editar">
                </form>
              <?php } ?>
            </div>
        </section>

</section>


<!-- Pie de página-->
<?php include 'footer/footer.php'; ?>
