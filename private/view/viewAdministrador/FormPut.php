    <div class="container">
        <form id="formulario-info-update">
          <div class="form-row">
            <div class="form-group col-6 col-sm-3 col-md-3">
              <label class="text-danger" for="inputIDUSER">Id Usuario</label>
              <input type="text" class="form-control" id="inputIDUSER" placeholder="iduser" disabled>
            </div>
            <div class="form-group col-6 col-sm-2 col-md-3">
              <label class="text-danger" for="inputID">Id</label>
              <input type="text" class="form-control" id="inputID" placeholder="id" disabled>
            </div>
            <div class="form-group col-sm-7 col-md-6">
              <label class="text-danger" for="inputCODIGO">Codigo</label>
              <input type="text" class="form-control" id="inputCODIGO" placeholder="codigo" disabled>
            </div>

            <div class="form-group col-sm-7 col-md-3">
              <label class="text-primary" for="inputDni">Dni</label>
              <input type="text" class="form-control" id="inputDni" placeholder="Dni" >
            </div>
            <div class="form-group col-md-9">
              <label class="text-primary" for="inputNombres">Nombres</label>
              <input type="text" class="form-control" id="inputNombres" placeholder="Nombres" maxlength="30">
            </div>
            <div class="form-group col-md-10">
              <label class="text-primary" for="inputApellidos">Apellidos</label>
              <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos" maxlength="30">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label class="text-primary" for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
              <label class="text-primary" for="inputContacto">Contacto</label>
              <input type="text" class="form-control" id="inputContacto" placeholder="telefono o celular" maxlength="15">
            </div>
            
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <label class="text-primary" for="inputDomicilio">Domicilio</label>
              <input type="text" class="form-control" id="inputDomicilio" placeholder="Jr ejemplo 888" disabled>
            </div>
            
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label class="text-primary" for="opcion">Sexo</label>
              <select id="inputSexo" name="sexo" class="form-control">
                <option selected>Opcion</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
            </div>
            <div class="form-group col-md-8">
              <label class="text-primary" for="inputPassword">Password</label>
              <!-- falta implementar para previsualizar la contraseña-->
              <input type="text" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
        </form>
    </div>