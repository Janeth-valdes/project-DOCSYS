  
$('.formulario-eliminar').submit(function(event){
  event.preventDefault();
  Swal.fire({
      title: '¿Seguro que desea eliminar este registro?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, deseo eliminar.'
    }).then((result) => {
  if (result.value) {
      this.submit();
     
  }
});
});
//GUARDAR//
function saveconfirm() {
    swal.fire({
        title: '¿Seguro que desea realizar el registro?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, registrar!'
            }).then((result) => {
    if (result.value) {
        $('#btnSend').click();
    }else{
  swal.fire("Operación cancelada!");
  $('#re').click();
    }
      });
    }


//ACTUALIZAR//
function updateconfirm() {
  swal.fire({
      title: '¿Seguro que desea actualizar?',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: '¡Si, actualizar!'
          }).then((result) => {
  if (result.value) {
      $('#btnupdate').click();
  }else{
swal.fire("Operación cancelada!");
  }
    });
  }
  function mandarId(elem){
    alert(elem.id);
    
    }

