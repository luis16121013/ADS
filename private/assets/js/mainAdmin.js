//console.log(idRegistro);
const dataAditional=document.querySelector('#infoAdicional');
const pagination=document.querySelector('#table-pagination-global');
const search=document.querySelector('#myInput');
let ArregloJson=[];
let datasBrowser=[];
/* reiniciamos el arreglo de obj JSON */
const resetDataJson=(arr=ArregloJson)=>{
  while(arr.length>0){
    arr.pop();
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
const printByRange=(initial=0,arr=ArregloJson)=>{
  let final=initial+8;
  let tamArr=arr.length;
  const rellenar=document.querySelector('#myTable');
  rellenar.innerHTML='';
  while(true){
    rellenar.innerHTML+=`
        <tr>
          <td>${arr[initial].codigo}</td>
          <td>${arr[initial].nombre}</td>
          <td>${arr[initial].apellido}</td>
          <td>${arr[initial].email}</td>
          <td>${arr[initial].contacto}</td>
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
const printTable=(cantPrint=0,arr=ArregloJson)=>{
    printByRange(cantPrint,arr);
}

/* CREANDO LA PAGINACION DE LA TABLA DE DATOS */
const createPaginationOftable=(Arreglo=ArregloJson,view=true)=>{
  let cantPagination=Math.ceil(Arreglo.length/8);
  if(view){
      pagination.innerHTML='';
      pagination.innerHTML+=`
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li> `;
        for(let i=0;i<cantPagination;i++){
          pagination.innerHTML+=`
            <li class="page-item ${(i==0)?'':''}"><a class="page-link" href="#">${(i+1)}</a></li>
          `;
        }
      pagination.innerHTML+=`
      <li class="page-item"><a class="page-link" href="#">Next</a></li> `;
  }
return cantPagination;
}

/* METODO DE BUSQUEDA DINAMICA */
/* $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}); */

/**
 * METODO DE BUSQUEDA POR ARREGLO JSON
 */
const busquesaJson=()=>{
  let textSearch=search.value.toLowerCase();
  resetDataJson(datasBrowser);
  for(let v of ArregloJson){
    const codigo=v.codigo.toLowerCase();
    const nombre=v.nombre.toLowerCase();
    const apellido=v.apellido.toLowerCase();
    const email=v.email.toLowerCase();
    const contacto=v.contacto.toLowerCase();
    if(codigo.indexOf(textSearch)!=-1 || nombre.indexOf(textSearch)!=-1 || apellido.indexOf(textSearch)!=-1
      || email.indexOf(textSearch)!=-1 || contacto.indexOf(textSearch)!=-1
    ){
      datasBrowser.push(v);
    }
  }
  if(datasBrowser.length>0){
    if(datasBrowser.length<=8){
      printTable(0,datasBrowser);
      createPaginationOftable(datasBrowser);
    }else{
      printTable(0,datasBrowser);
      createPaginationOftable(datasBrowser);
    }
  }else{
    console.log("no hay data");
    createPaginationOftable(datasBrowser);
  }
}


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
}
if(pagination!==null){
  pagination.addEventListener('click',e=>{
    e.preventDefault();
    //console.log(e.target.textContent);
    //console.log(createPaginationOftable(ArregloJson,false));
    let numberPagination=1;
    let rangePrintPagination=0;
    let numberPress=parseInt(e.target.textContent);

    let cant=createPaginationOftable(ArregloJson,false);
    if(datasBrowser.length>0){
      cant=createPaginationOftable(datasBrowser,false);
      while(numberPagination<=cant){
        if(numberPress===numberPagination){
          printTable(rangePrintPagination,datasBrowser);
          break;
        }
        rangePrintPagination+=8;
        numberPagination++;
      }
    }else{
      while(numberPagination<=cant){
        if(numberPress===numberPagination){
          printTable(rangePrintPagination);
        }
        rangePrintPagination+=8;
        numberPagination++;
      }
    }

  })
}
if(search!==null){
  search.addEventListener('keyup',e=>{
    e.preventDefault();
    busquesaJson();
  })
}
