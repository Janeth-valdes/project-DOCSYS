function onLoadImage(files){
    console.log(files)
    if (files && files[0]) {
      document
        .getElementById('imgName')
        .innerHTML = files[0].name
    }
  }
  
  //Select del roles
   $(document).ready(function(){
    $('#select').selectpicker();
    $('#select1').selectpicker();
    $('#select2').selectpicker();
    $('#select3').selectpicker();
    $('#select4').selectpicker();
    $('#select5').selectpicker();
    $('#select6').selectpicker();
    $('#select7').selectpicker();
    $('#select8').selectpicker();
  });
      //Mostrar nombre del documento
   
      /** inicio file **/
   
      document.querySelector('#file').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile');
        boxFile.classList.remove('attached2');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached');
          }
        }
      }); 
       /**inicio file2 **/
      document.querySelector('#file2').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile2');
        boxFile.classList.remove('attached2');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached2');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached2');
          }
        }
      }); 
        /**inicio file21 **/
      document.querySelector('#file21').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile21');
        boxFile.classList.remove('attached21');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached21');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached21');
          }
        }
      }); 
           /**inicio file22 **/
      document.querySelector('#file22').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile22');
        boxFile.classList.remove('attached22');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached22');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached22');
          }
        }
      }); 
        /**inicio file31 **/
      document.querySelector('#file31').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile31');
        boxFile.classList.remove('attached31');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached31');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached31');
          }
        }
      }); 
        /**inicio file32 **/
      document.querySelector('#file32').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile32');
        boxFile.classList.remove('attached32');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached32');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached32');
          }
        }
      }); 
        /**inicio file4 **/
      document.querySelector('#file4').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile4');
        boxFile.classList.remove('attached4');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached4');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached4');
          }
        }
      });
        /**inicio file51 **/
      document.querySelector('#file51').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile51');
        boxFile.classList.remove('attached51');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached51');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached51');
          }
        }
      });  
      /**inicio file52 **/
      document.querySelector('#file52').addEventListener('change', function(e) {
        var boxFile = document.querySelector('.boxFile52');
        boxFile.classList.remove('attached52');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        if(this.value != '') {
          var allowedExtensions = /(\.pdf)$/i;
          if(allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached52');
          } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf');
            boxFile.classList.remove('attached52');
          }
        }
      });
    //Receteo del select de roles 
      $("#reset").on("click", function () {
        $("#select").val('default').selectpicker("refresh");
        $('input[type="file"]').val('');
        var boxFile = document.querySelector('.boxFile');
        boxFile.classList.remove('attached');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
      //Receteo del select de roles 2
      $("#reset2").on("click", function () {
        $("#select3").val('default').selectpicker("refresh");
        $('input[type="file"]').val('');
        var boxFile = document.querySelector('.boxFile2');
        boxFile.classList.remove('attached2');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
         });
      //Receteo del select de roles 21
       $("#reset21").on("click", function () {
        $("#select2").val('default').selectpicker("refresh");
        $('input[type="file"]').val('');
        var boxFile = document.querySelector('.boxFile21');
        boxFile.classList.remove('attached21');
        boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
         });
      //Receteo del select de roles 22
         $("#reset22").on("click", function () {
          $("#select1").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile22');
          boxFile.classList.remove('attached22');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
      //Receteo del select de roles 31
         $("#reset31").on("click", function () {
          $("#select4").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile31');
          boxFile.classList.remove('attached31');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
       //Receteo del select de roles 32
         $("#reset32").on("click", function () {
          $("#select5").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile32');
          boxFile.classList.remove('attached32');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
      //Receteo del select de roles 4
         $("#reset4").on("click", function () {
          $("#select6").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile4');
          boxFile.classList.remove('attached4');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
      //Receteo del select de roles 51
         $("#reset51").on("click", function () {
          $("#select7").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile51');
          boxFile.classList.remove('attached51');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });
      //Receteo del select de roles 52
         $("#reset52").on("click", function () {
          $("#select8").val('default').selectpicker("refresh");
          $('input[type="file"]').val('');
          var boxFile = document.querySelector('.boxFile52');
          boxFile.classList.remove('attached52');
          boxFile.innerHTML = '<i class="fas fa-cloud-upload-alt"></i>';
        });

