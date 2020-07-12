//console.log(idRegistro);
const dataAditional=document.querySelector('#infoAdicional');
const pagination=document.querySelector('#table-pagination-global');
let ArregloJson=[];

/* reiniciamos el arreglo de obj JSON */
const resetDataJson=()=>{
  while(ArregloJson.length>0){
    ArregloJson.pop();
  }
}

/* ingresamos datos para el arreglo */
const createDataByJson=(id,cod,rol,nombre,apellido,email,phone)=>{
    let Teacher={
      idUser:id,
      codigo:cod,
      rol:rol,
      nombre:nombre,
      apellido:apellido,
      email:email,
      contacto:phone
    }
    ArregloJson.push(Teacher);
}

/* imprimimos datos en tabla */
const printByRange=(initial=0)=>{
  let final=initial+8;
  let tamArr=ArregloJson.length;
  const rellenar=document.querySelector('#myTable');
  rellenar.innerHTML='';
  while(true){
    rellenar.innerHTML+=`
        <tr>
          <td>${ArregloJson[initial].codigo}</td>
          <td>${ArregloJson[initial].nombre}</td>
          <td>${ArregloJson[initial].apellido}</td>
          <td>${ArregloJson[initial].email}</td>
          <td>${ArregloJson[initial].contacto}</td>
        </tr>
    `;
    initial++;
    if(tamArr===initial){//romper bucle si pasa el tamaño dela matriz
      break;
    }
    if(initial===final){
      break;
    }
  }
}
const printTable=(cantPrint=0)=>{
    printByRange(cantPrint);
}

/* CREANDO LA PAGINACION DE LA TABLA DE DATOS */
const createPaginationOftable=()=>{
  let cantPagination=Math.ceil(ArregloJson.length/8);
  pagination.innerHTML='';
  pagination.innerHTML+=`
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li> `;
    for(let i=0;i<cantPagination;i++){
      pagination.innerHTML+=`
        <li class="page-item ${(i==0)?'active':''}"><a class="page-link" href="#">${(i+1)}</a></li>
      `;
    }
  pagination.innerHTML+=`
    <li class="page-item"><a class="page-link" href="#">Next</a></li> `;
}

/* METODO DE BUSQUEDA DINAMICA */
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


/**
 * informacion de API pagina Perfil 
 */
const getDataAdmin=()=>{
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`http://192.168.0.4/ADS/api/users/admins/${idRegistro}`)
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


/**
 * informacion de API tabla USERS/TEACHERS
 */
const getDataConfigTeacher=()=>{
    resetDataJson();
    const rellenar=document.querySelector('#myTable');
    rellenar.innerHTML='';
    fetch('http://192.168.0.4/ads/api/users/teachers/')
    .then(res=>res.json())
    .then(data=>{
      for(let j of data){
        createDataByJson(j.idUser,j.codigo,j.cargo,j.firstName,j.lastName,j.Email,j.phone);
      }  
    })
    .then(function(){
      printTable();
      createPaginationOftable();
    })
    //console.log(ArregloJson);/* comprobando los datos del arreglo */ 
}

const loader=()=>{
  if(typeof pageAdmin!="undefined"){//verificamos si la variable esta definida 
    if(pageAdmin==='inicio'){
      console.log('pagina de inicio');
    }else if(pageAdmin==='perfil'){
      getDataAdmin();
    }else if(pageAdmin==='configDocente'){
      getDataConfigTeacher();
    }
  }
    //console.log("datos: "+pageAdmin);
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
}else if(pagination!==null){
pagination.addEventListener('click',e=>{
  e.preventDefault();
  console.log(e.target.textContent);
  
  let option=e.target.textContent;
  if(option==='1'){
    printTable(0);
  }else if(option==='2'){
    printTable(8);
/*     e.target.classList.add('bg-primary');
    e.target.classList.add('text-white'); */
  }
})
}
console.log(pagination.children);
