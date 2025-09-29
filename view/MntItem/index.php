<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../mainHeader.php") ?>
    <title>Mantenimiento de productos</title>
  </head>

  <body>

    <?php require_once("../mainLeftPanel.php")?>
    <?php require_once("../mainHeadPanel.php")?>
    <?php require_once("../mainRightPanel.php")?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Mantenimiento</a>
          <span class="breadcrumb-item active">Producto</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Producto</h4>
        <p class="mg-b-0">Desde esta ventana podrá dar mantenimiento a los productos</p>
      </div>

      <div class="br-pagebody">

              <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Mantenimiento de productos</h6>
          <button id="btn-new" class="btn btn-outline-primary btn-block mg-b-10">Nuevo registro</button>

          <div class="table-wrapper">
            <table id="item_data" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-30p">Nombre</th>
                  <th class="wd-20p">Categoría</th>
                  <th class="wd-30p">Descripción</th>
                  <th class="wd-10p"></th>
                  <th class="wd-10p"></th>
                </tr>
              </thead>
              <tbody>
</tbody>
</table>
</div>


      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
     <?php require_once("modalmantenimiento.php"); ?>

     <?php require_once("../mainJS.php") ?>

    <script type="text/javascript" src="mntitem.js"></script>
  </body>
</html>
