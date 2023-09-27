@include('partials.nav')


<div id="wrapper">

  <div class="col-12 p-5">
    <!-- container-title  -->
    <div class="mb-4">
      <div class="row card shadow border-0">
        <div class="card-body">
          <h2 class="title m-3">Sistema de Gestión de la Calidad 2022</h2>
        </div>
      </div>
    </div>

    <!-- container- body -->

    <div class="mt-5">
      <div class="row card shadow">
        <div class="card-body p-4">

          <div class="accordion" id="accordionExample">
            <!-- Seccion 1 -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nUno" aria-expanded="true" aria-controls="collapseOne">
                  <h4><b>1° Nivel </b> Misión Visión Política y Objetivos.</h4>
                </button>
              </h2>
              <div id="nUno" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Documento</th>
                        <th scope="col" class="text-center">Ver</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datos as $d)
                      <tr>
                        @if($d->directorio==1)
                        <td>{{$d->nombre}}</td>
                        <td class="text-center">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                            <i class="fa-regular fa-eye"></i>
                          </button>

                          <!-- Modal -->
                          <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>
                        @endif
                      </tr>
                      @endforeach
                      <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Seccion 2 -->
            <div class="accordion-item">

              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nDos" aria-expanded="false" aria-controls="collapseTwo">
                  <h4><b>2° Nivel</b> Manual y Anexos</h4>
                </button>
              </h2>

              <div id="nDos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <!-- Doc 1 -->
                  <section>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Documento</th>
                          <th scope="col" class="text-center">Ver</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($datos as $d)
                        <tr>
                          @if($d->directorio==2)
                          <td>{{$d->nombre}}</td>
                          <td class="text-center">
                            <!-- Button trigger modal 👁‍🗨 -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                              <i class="fa-regular fa-eye"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </td>
                          <td>
                          </td>
                          @endif
                        </tr>
                        @endforeach
                        <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                      </tbody>
                    </table>
                  </section>
                  <section>
                    <section>
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dosUno" aria-expanded="true" aria-controls="collapseOne">
                          <h4><b>2.1 </b> Anexos de Manual de Calidad</h4>
                        </button>
                      </h2>
                      <div id="dosUno" class="accordion-collapse collapse" data-bs-parent="#accordionExamples">
                        <div class="accordion-body">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Documento</th>
                                <th scope="col" class="text-center">Ver</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($datos as $d)
                              <tr>
                                @if($d->directorio==2.1)
                                <td>{{$d->nombre}}</td>
                                <td class="text-center">
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                                    <i class="fa-regular fa-eye"></i>
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </td>
                                @endif
                              </tr>
                              @endforeach
                              <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </section>
                    <section>
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dosDos" aria-expanded="true" aria-controls="collapseOne">
                          <h4><b>2.2 </b> Anexos Planes y Secuencias</h4>
                        </button>
                      </h2>
                      <div id="dosDos" class="accordion-collapse collapse" data-bs-parent="#accordionExamplesdos">
                        <div class="accordion-body">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Documento</th>
                                <th scope="col" class="text-center">Ver</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($datos as $d)
                              <tr>
                                @if($d->directorio==2.2)
                                <td>{{$d->nombre}}</td>
                                <td class="text-center">
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                                    <i class="fa-regular fa-eye"></i>
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </td>
                                @endif
                              </tr>
                              @endforeach
                              <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </section>
                  </section>
                </div>
              </div>

            </div>

            <!--- Seccion 3  -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#procedimientos" aria-expanded="false" aria-controls="collapseTres">
                  <h4> <b>3° Nivel</b> Procedimientos</h4>
                </button>
              </h2>
              <div id="procedimientos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <section>
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#procu" aria-expanded="false" aria-controls="collapseProced">
                        <h4><b>3.1 Proc.</b>Apoyo 07-13</h4>
                      </button>
                    </h2>

                    <div id="procu" class="accordion-collapse collapse" data-bs-parent="#accordionExamplenist">
                      <div class="accordion-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Documento</th>
                              <th scope="col" class="text-center">Ver</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($datos as $d)
                            <tr>
                              @if($d->directorio==3.1)
                              <td>{{$d->nombre}}</td>
                              <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                                  <i class="fa-regular fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </td>
                              @endif
                            </tr>
                            @endforeach
                            <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                  <section>
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#procus" aria-expanded="true" aria-controls="collapseProced">
                        <h4><b>3.1 Proc.</b>Normativos del 01 - 14</h4>
                      </button>
                    </h2>

                    <div id="procus" class="accordion-collapse collapse" data-bs-parent="#accordionExampleniste">
                      <div class="accordion-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Documento</th>
                              <th scope="col" class="text-center">Ver</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($datos as $d)
                            <tr>
                              @if($d->directorio==3.2)
                              <td>{{$d->nombre}}</td>
                              <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$d->id_documento}}">
                                  <i class="fa-regular fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal" id="modal_{{$d->id_documento}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">{{$d->nombre}}</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="{{ route('verdoc',['id'=>$d->id_documento]) }}"></object>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </td>
                              @endif
                            </tr>
                            @endforeach
                            <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>

            <!-- Seccion 4 -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nCuatro" aria-expanded="false" aria-controls="collapseThree">
                  <h4> <b>4° Nivel</b> Nivel Intructivos de Trabajo</h4>
                </button>
              </h2>
              <div id="nCuatro" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <h2>Hola Mundo</h2>
                </div>
              </div>
            </div>

            <!-- Seccion 5 -->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nCinco" aria-expanded="false" aria-controls="collapseThree">
                  <h4> <b>5° Nivel</b> Nivel Formatos y Registros</h4>
                </button>
              </h2>
              <div id="nCinco" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <h2>Hola Mundo</h2>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>