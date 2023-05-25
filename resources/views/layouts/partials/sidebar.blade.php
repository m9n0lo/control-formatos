 <ul>
     <li>
         <a href="{{ route('formato') }}">
             <i class="fa fa-home fa-2x"></i>
             <span class="nav-text">
                 Formato Mantenimiento
             </span>
         </a>
     </li>


     <li class="has-subnav">
         <a class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
             aria-expanded="false">
             <i class="fa-solid fa-shop fa-xl"></i>
             <span class="nav-text">
                 Compras
             </span>
         </a>

         <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
             <li class="dropdown-item">
                 <a href="{{ route('compras.solicitud') }}">
                     <i class="fa fa-home fa-2x"></i>
                     <span class="nav-text">
                         Solicitud RQS
                     </span>
                 </a>
             </li>
             <li class="dropdown-item">
                 <a class="dropdown-item" href="{{ route('compras.dashboard') }}">Dashboard</a>
             </li>

         </ul>
     </li>

     <li class="has-subnav">
         <a class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
             aria-expanded="false">
             <i class="fa-solid fa-shop fa-xl"></i>
             <span class="nav-text">
                 SST
             </span>
         </a>

         <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
             <li class="dropdown-item">
                 <a href="{{ route('sst') }}">
                     <i class="fa fa-home fa-2x"></i>
                     <span class="nav-text">
                         Entrega SST
                     </span>
                 </a>
             </li>
             <li class="dropdown-item">
                 <a class="dropdown-item" href="{{ route('articulos') }}">Articulos SST</a>
             </li>
             <li class="dropdown-item">
                <a class="dropdown-item" href="{{ route('sst.dashboard') }}">Dashboard SST</a>
            </li>
             <li class="dropdown-item">
                <a class="dropdown-item" href="{{ route('informesst') }}">Informes SST</a>
            </li>

         </ul>
     </li>



 </ul>

 <ul class="logout">
     <li>

         @auth
             <h4 style="color:antiquewhite">{{ auth()->user()->name }}</h4>


             <a href="{{ route('logout.perform') }}">
                 <i class="fa fa-power-off fa-2x"></i>
                 <span class="nav-text">
                     Logout
                 </span>
             </a>

         @endauth

     </li>
 </ul>
