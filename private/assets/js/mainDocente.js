//console.log(idRegistro);
const dataAditional=document.querySelector('#infoAdicional');

const getDataDocente=()=>{
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`http://192.168.0.4:8888/api/docente/${idRegistro}`)
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
                <b>Email</b> <a class="float-right">${v.email}</a>
              </li>
            `;
        }
    })
}
//getDataDocente();


//configuaricon para manejo d errores al cargar las pages 
const loader=()=>{
  if(typeof idRegistro !="undefined"){
    getDataDocente();
  }
}
loader();

if(dataAditional!==null){
dataAditional.addEventListener('click',e=>{
    e.preventDefault();
    Swal.fire({
        type:'success',
        title:'Exito!',
        text:'Datos guardados.'
    })
})

}