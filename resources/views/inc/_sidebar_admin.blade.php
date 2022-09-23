<aside>

  <div style="z-index: 2" id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">

	  <li>
	      <a class="" href="{{url('/')}}">
		  <i class="fa fa-dashboard"></i>
		  <span>Inicio</span>
	      </a>
	  </li>

	  <li class="sub-menu">
	      <a href="javascript:;" >
		{{-- <i class="fa fa-globe"></i> --}}
		<span>Admin</span>
	      </a>

	      <ul class="sub">
		  <li>
		      <a href="{{url('/admin/temas-show')}}">
			  Administrar Temas
		      </a>
		  </li>
	      </ul>

	  </li>                    

	  <li>
	      <a class="" href="{{url('/admin/manage-users')}}">
		  <span>Usuarios</span>
	      </a>
	  </li>

<!--
	  <li>
	      <a href="#">
		  Salir
	      </a>
	  </li>
-->
	</ul>
      </ul>
      <!-- sidebar menu end-->
    </div>
</aside>
