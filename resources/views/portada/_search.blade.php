<!-- BARRA DE BUSQUEDA Y CARRUSEL -->

<div class="container search">
  <form class="container h-100" action="{{route('searchs.show')}}" >
      <div class="row h-100 align-items-center">
          <div class="col-md-4 texto-buscar">
              <p >Encuentra una receta para tu próxima comida</p>

              <input
                  type="search"
                  name="searching"
                  class="form-control"
                  placeholder="Buscar Receta"
              />
          </div>
      </div>
  </form>
</div>
