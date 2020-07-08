//console.log(idRegistro);
const getDataDocente=()=>{
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`http://192.168.0.4/ADS/api/users/teachers/${idRegistro}`)
    .then(res=>res.json())
    .then(data=>{
        for(let v of data){
            registro.innerHTML+=`
              <li class="list-group-item">
                <b>Nombre </b> <a class="float-right">${v.firstName}</a>
              </li>
              <li class="list-group-item">
                <b>Apellido</b> <a class="float-right">${v.lastName}</a>
              </li>
              <li class="list-group-item">
                <b>Contacto</b> <a class="float-right">${v.phone}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">${v.Email}</a>
              </li>
            `;
        }
    })
}
getDataDocente();
const dataAditional=document.querySelector('#infoAdicional');
dataAditional.addEventListener('click',e=>{
    e.preventDefault();
    Swal.fire({
        type:'success',
        title:'Exito!',
        text:'Datos guardados.'
    })
})