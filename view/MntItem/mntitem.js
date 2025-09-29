var table;

function init() {
    $("#item_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

$(document).ready(function () {
  table = $("#item_data")
    .dataTable({
      aProcessing: true, //Activamos el procesamiento del datatables
      aServerSide: true, //Paginación y filtrado realizados por el servidor
      dom: "Bfrtip", //Definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../../controller/item.php?op=retrieve",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10, //Por cada 10 registros hace una paginación
      order: [[0, "asc"]], //Ordenar (columna,orden)
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#item_form")[0]);
    $.ajax({
        url: "../../controller/item.php?op=saveAndUpdate",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#item_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#item_data').DataTable().ajax.reload();

            swal.fire(
                'Registro!',
                'El registro correctamente.',
                'success'
            )
        }
    });
}

function edit(item_id) {
  console.log(item_id);
}

function destroy(item_id) {
    swal.fire({
        title: "¿Estás seguro que deseas eliminar el registro?",
        text: "¡No podrás revertir esta operación!",
        icon: "error",
        showCancelButton: true,
        confirmButtonText: "Si",
        cancelButtonText: "No",
        reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                "../../controller/item.php?op=destroy",
                { item_id: item_id },
                function (data) {}
                );

                $('#item_data').DataTable().ajax.reload();

                swal.fire("Eliminado", "¡Registro eliminado con éxito!", "success");
            }
        });
    }

$(document).on("click", "#btn-new", function () {
  $("#mdl-title").html("Nuevo registro");
  $("#modalmantenimiento").modal("show");
});

init();
