/**
 * DECLARE VAR GLOBAL FOR USE IN CRUD AJAX
 */
const configPerfil=document.querySelector('#infoAdicional');

/**
 * CONFIGURATION PERFIL ADMIN
 */
const updateInfoStudent=()=>{
    configPerfil.addEventListener('click',e=>{
        e.preventDefault();
        Swal.fire({
            type:'success',
            title:'Exito!',
            text:'Datos guardados.'
        })
    })
}


/**
 * AJAX PERFIL NAV
 */
const getPerfil=()=>{
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`${urlAjax}/API/students/${idRegistro}`)
    .then(res=>res.json())
    .then(data=>{
        for(let v of data){
            registro.innerHTML+=`
              <li class="list-group-item">
                <b class="text-primary">Dni</b> <a class="float-right">${v.dni}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Nombre </b> <a class="float-right">${v.firstName}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Apellido</b> <a class="float-right">${v.lastName}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Email</b> <a class="float-right">${v.email}</a>
              </li>
            `;
        }
    })
}

/**
 * CONTROLLER LOAD PAGE ADMIN
 */
const loader=()=>{
    if(typeof pageDocente!="undefined"){
      if(pageDocente==='inicio'){
        console.log('pagina de inicio');
      }else if(pageDocente==='perfil'){
          getPerfil()
          updateInfoStudent()
          console.log(pageDocente);
      }
    }
}
loader()