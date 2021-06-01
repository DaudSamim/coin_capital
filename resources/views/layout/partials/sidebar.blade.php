<!-- 

<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/home" class="sidebar-brand" style="font-size:18px">
            Metal <span> Estructuras</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
          

            @if(auth()->user()->new_employee == 1 || auth()->user()->list_employees == 1 || auth()->user()->history_employees == 1 )
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ip" role="button" aria-expanded="false"
                    aria-controls=ip>
                    <i class="link-icon" data-feather="terminal"></i>
                    <span class="link-title">Trabajador</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                
                <div class="collapse"
                    id="ip">
                    <ul class="nav sub-menu">
                        @if(auth()->user()->new_employee == 1)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#ip1" role="button" aria-expanded="false"
                    aria-controls=ip1 href="/new_employee"
                                class="nav-link  ">nuevo Trabajador <i class="link-arrow" data-feather="chevron-down"></i></a>
                                <div class="collapse"
                    id="ip1">
                    <ul class="nav sub-menu">
                        @if(auth()->user()->new_employee == 1)
                        <li class="nav-item">
                            <a href="/new_employee"
                                class="nav-link  ">nuevo Trabajador</a>
                        </li>
                        @endif
                        @if(auth()->user()->list_employees == 1)
                        <li class="nav-item">
                            <a href="/list_employees"
                                class="nav-link ">listado Trabajador</a>
                        </li>
                        @endif
                        @if(auth()->user()->history_employees == 1)
                        <li class="nav-item">
                            <a href="/history_employees"
                                class="nav-link ">histórico de Trabajadores</a>
                        </li>
                        @endif
                    </ul>
                </div>
                        </li>
                        @endif
                        @if(auth()->user()->list_employees == 1)
                        <li class="nav-item">
                            <a href="/list_employees"
                                class="nav-link ">listado Trabajador</a>
                        </li>
                        @endif
                        @if(auth()->user()->history_employees == 1)
                        <li class="nav-item">
                            <a href="/history_employees"
                                class="nav-link ">histórico de Trabajadores</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif


            @if(auth()->user()->project_list == 1 || auth()->user()->production == 1 || auth()->user()->dedicated_time == 1 )
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#strm" role="button" aria-expanded="false"
                    aria-controls="strm">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Asignar trabajador</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="strm">
                    <ul class="nav sub-menu">
                        @if(auth()->user()->project_list == 1)
                        <li class="nav-item">
                            <a href="/project_list" class="nav-link ">listado proyectos</a>
                        </li>
                        @endif
                        @if(auth()->user()->production == 1)
                        <li class="nav-item">
                            <a href="/production" class="nav-link ">producción</a>
                        </li>
                        @endif
                        @if(auth()->user()->dedicated_time == 1)
                        <li class="nav-item">
                            <a href="/dedicated_time" class="nav-link ">tiempos dedicados</a>
                        </li>  
                        @endif 
                    </ul>
                </div>
            </li>
            @endif

            @if(auth()->user()->create_tool == 1 || auth()->user()->list_tools == 1 || auth()->user()->history_tools == 1 || auth()->user()->create_state == 1)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#output" role="button" aria-expanded="false"
                   aria-controls="output">
                    <i class="link-icon" data-feather="external-link"></i>
                    <span class="link-title">Equipo / Herramienta</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse "
                     id="output">
                    <ul class="nav sub-menu">
                        @if(auth()->user()->create_tool == 1)
                        <li class="nav-item">
                            <a href="/create_tool"
                               class="nav-link  ">Crear Equipo / Herramienta</a>
                        </li>
                        @endif
                        @if(auth()->user()->list_tools == 1)
                        <li class="nav-item">
                            <a href="/list_tools"
                               class="nav-link ">listado Equipo / Herramienta</a>
                        </li>
                        @endif
                        @if(auth()->user()->history_tools == 1)
                        <li class="nav-item">
                            <a href="/list_tools"
                               class="nav-link  ">histórico Equipo / Herramienta</a>
                        </li>
                        @endif
                        @if(auth()->user()->create_state == 1)
                        <li class="nav-item">
                            <a href="/create_state"
                               class="nav-link ">crear estado , crear ubicacion , crear tipo</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif

            @if(auth()->user()->username == 'admin')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#cdn-ip" role="button" aria-expanded="false"
                   aria-controls=cdn-ip>
                    <i class="link-icon" data-feather="terminal"></i>
                    <span class="link-title">Admin Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse "
                     id="cdn-ip">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('user') }}"
                               class="nav-link ">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="/password"
                               class="nav-link  ">Change Password</a>
                        </li>
                       
                    </ul>
                </div>
            </li>
            @endif

        </ul>
    </div>
</nav> -->

<nav class="sidebar">
   <div class="sidebar-header">
      <a href="/home" class="sidebar-brand" style="font-size:18px">
      Metal <span> Estructuras</span>
      </a>
      <div class="sidebar-toggler not-active">
         <span></span>
         <span></span>
         <span></span>
      </div>
   </div>
   <div class="sidebar-body">
      <ul class="nav">
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ip" role="button" aria-expanded="false"
               aria-controls=ip>
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">Proyectos</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse"
               id="ip">
               <ul class="nav sub-menu">
                  <li class="nav-item">
                     <a data-toggle="collapse" href="#ip1" role="button" aria-expanded="false"
                        aria-controls=ip1 href="/new_employee"
                        class="nav-link  ">Crear Proyecto <i class="link-arrow" data-feather="chevron-down"></i></a>
                     <div class="collapse"
                        id="ip1">
                        <ul class="nav sub-menu">
                           <li class="nav-item">
                              <a href="/new_employee"
                                 class="nav-link  ">Datos generales del proyecto</a>
                           </li>
                           <li class="nav-item">
                              <a href="/list_employees"
                                 class="nav-link ">Programar Tareas y Sub-tareas</a>
                           </li>
                           <li class="nav-item">
                              <a href="/history_employees"
                                 class="nav-link ">Programar materiales
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a href="/list_employees"
                        class="nav-link ">Crear Tareas / Sub-tareas</a>
                  </li>
                  <li class="nav-item">
                     <a href="/history_employees"
                        class="nav-link ">Gantt
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/history_employees"
                        class="nav-link ">Status de los proyectos
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#strm" role="button" aria-expanded="false"
               aria-controls="strm">
            <i class="link-icon" data-feather="layers"></i>
            <span class="link-title">Trabajadores</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="strm">
               <ul class="nav sub-menu">
                  <li class="nav-item">
                     <a href="/project_list" class="nav-link ">Crear trabajador</a>
                  </li>
                  <li class="nav-item">
                     <a href="/production" class="nav-link ">Asignar Trabajadores</a>
                  </li>
                  <li class="nav-item">
                     <a href="/dedicated_time" class="nav-link ">Desempeño diario del trabajador</a>
                  </li>
                  <li class="nav-item">
                     <a href="/" class="nav-link ">Desempeño semanal del trabajador</a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ip34" role="button" aria-expanded="false"
               aria-controls=ip>
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">Materiales</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse"
               id="ip34">
               <ul class="nav sub-menu">
                  <li class="nav-item">
                     <a data-toggle="collapse" href="#ip341" role="button" aria-expanded="false"
                        aria-controls=ip341 href="/new_employee"
                        class="nav-link  ">Crear Materiales  <i class="link-arrow" data-feather="chevron-down"></i></a>
                     <div class="collapse"
                        id="ip341">
                        <ul class="nav sub-menu">
                           <li class="nav-item">
                              <a href="/new_employee"
                                 class="nav-link  ">Datos generales del proyecto</a>
                           </li>
                           <li class="nav-item">
                              <a href="/list_employees"
                                 class="nav-link ">Programar Tareas y Sub-tareas</a>
                           </li>
                           <li class="nav-item">
                              <a href="/history_employees"
                                 class="nav-link ">Programar materiales
                              </a>
                           </li>
                        </ul>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a href="/list_employees"
                        class="nav-link ">Crear Tareas / Sub-tareas</a>
                  </li>
                  <li class="nav-item">
                     <a href="/history_employees"
                        class="nav-link ">Gantt
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/history_employees"
                        class="nav-link ">Status de los proyectos
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#output" role="button" aria-expanded="false"
               aria-controls="output">
            <i class="link-icon" data-feather="external-link"></i>
            <span class="link-title">Equipo / Herramienta</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse "
               id="output">
               <ul class="nav sub-menu">
                  <li class="nav-item">
                     <a href="/create_tool"
                        class="nav-link  ">Crear Equipo / Herramienta</a>
                  </li>
                  <li class="nav-item">
                     <a href="/list_tools"
                        class="nav-link ">listado Equipo / Herramienta</a>
                  </li>
                  <li class="nav-item">
                     <a href="/list_tools"
                        class="nav-link  ">histórico Equipo / Herramienta</a>
                  </li>
                  <li class="nav-item">
                     <a href="/create_state"
                        class="nav-link ">crear estado , crear ubicacion , crear tipo</a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cdn-ip" role="button" aria-expanded="false"
               aria-controls=cdn-ip>
            <i class="link-icon" data-feather="terminal"></i>
            <span class="link-title">Admin Settings</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse "
               id="cdn-ip">
               <ul class="nav sub-menu">
                  <li class="nav-item">
                     <a href="{{ url('user') }}"
                        class="nav-link ">Users</a>
                  </li>
                  <li class="nav-item">
                     <a href="/password"
                        class="nav-link  ">Change Password</a>
                  </li>
               </ul>
            </div>
         </li>
      </ul>
   </div>
</nav>