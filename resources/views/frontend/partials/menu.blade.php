<div class="head">
				<div class="navbar-top">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
						<div class="navbar-brand logo ">
							<h1><a ="{{route('frontend.home')}}"> Jurisprudencia <i class="fa fa-balance-scale" aria-hidden="true"></i></a></h1>
						</div>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav link-effect-4">
							<li class="active"><a href="{{route('frontend.home')}}" data-hover="Home">inicio</a> </li>
							<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Practicas</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Cronograma</a> 
								 <a class="dropdown-item" href="#">Requisitos</a> 
								 <a href="#" class="dropdown-item" data-target="#myModal" data-toggle="modal">Solicitud </a>
							</div>
								
							</li>
						
							<li><a href="#features" class="scroll">Nosotros </a> </li>
							<li><a href="#news" class="scroll">Noticias</a></li>
							<!--<li><a href="#services" class="scroll">Practice Areas</a> </li>-->
							
							<!--<li><a href="#team" class="scroll">Team</a></li>-->
							<li><a href="#contact" class="scroll">Contactenos</a></li>
							<li><a href="{{route('administracion')}}" target="_blank">Inicia Sesión</a></li>

						</ul>
					</div>
				
					<!-- /.navbar-collapse -->
				</div>
			</div>


			