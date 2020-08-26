/**
 * DECLARE GLOBAL USE
 */
const configPerfil=document.querySelector('#infoAdicional');
const pagination=document.querySelector('#table-pagination-global');
const tbody=document.querySelector('#myTable');
const search=document.querySelector('#myInput');

/**
 * FOR VAR AJAX POST TEACHERS 
 */


/**
 * FOR SETTER FORM DATA
 */
const setIdUser=document.querySelector('#inputIDUSER');
const setId=document.querySelector('#inputID');
const setCodigo=document.querySelector('#inputCODIGO');
const setName=document.querySelector('#inputNombres');
const setLasName=document.querySelector('#inputApellidos');
const setEmail=document.querySelector('#inputEmail');
const setContact=document.querySelector('#inputContacto');
const setPassword=document.querySelector('#inputPassword');
const setSexo=document.querySelector('#opcion');
//VAR ACCESS UPDATE
const put = document.querySelector('#update');

/**
 * CREATE VAR FOR BUTTON EVENT POST
 */
//VAR ACCESS BUTTON-in-MODAL-CREATE
const EventButtonForm = document.querySelector('#addRegister');
//VAR CREATE POST BUTTON EVENT TEACHER
const registerTeacher=document.querySelector('#insert');

/**
 * CREATE METHOD SETTER FORM
 */
const setAllInformation=(p)=>{
    setIdUser.value=p.idUser;
    setId.value=p.id;
    setCodigo.value=p.codigo;
    setName.value=p.firstName;
    setLasName.value=p.lastName;
    setEmail.value=p.email;
    setContact.value=p.phone;
    setPassword.value=p.pass;
    if(p.sexo=='M'){
      setSexo.options[1].selected = true;
    }else{
      setSexo.options[2].selected = true;
    }
}



//CREATE JSON FOR INFO TEACHER LOCAL
let INFOJSON=[];
/**
 * METHOD RESET INFOJSON
 */
const RESETJSON=()=>{
    while(INFOJSON.length>0){
      INFOJSON.pop();
    }
}

/**
 * CONFIGURATION PERFIL ADMIN
 */
const updateInfoAdmin=()=>{
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
 * ADD EVENT BOTON - REGISTER FOR TEACHERS
 */
const addEventRegisterTeacher=()=>{
  EventButtonForm.addEventListener('click',()=>{
    post()
  })
}
//CREATE PROMISE FOR VALIDATE FORM TEACHER
function validate(res){
    let rpta=true;
    if(res.dni==''||res.contact==''||res.firstName==''||res.lastName==''||res.email==''||res.pass==''||res.sexo==''){
      return(false)
    }else{
      return(res)
    }
}
//RESET FORM TEACHER
const resetValuesForm=()=>{
  postDni.value='';
  postContact.value='';
  postFirstName.value='';
  postLastName.value='';
  postEmail.value='';
  postPass.value='';
  postOpcion.options[0].selected=true;
}
//CREATE FORM ACTION METHOD POST TEACHER
const post=()=>{
  registerTeacher.addEventListener('click', (e)=>{
    e.preventDefault();
      return new Promise((resolve,fail)=>{
        let objetoTeacher={
          dni:postDni.value.toUpperCase(),
          contact:postContact.value.toUpperCase(),
          firstName:postFirstName.value.toUpperCase(),
          lastName:postLastName.value.toUpperCase(),
          email:postEmail.value,
          pass:postPass.value,
          sexo:postOpcion.options[postOpcion.selectedIndex].value
        }
        resolve(objetoTeacher)
      })
      .then(obj=>{
        const env=validate(obj)
          if(env){
            fetch(`${urlAjax}/API/users/validate/${env.dni}`)
            .then(res=>res.json())
            .then(data=>{
              if(data){
                registrar(env)
              }else{
                Swal.fire({
                  type:'info',
                  title:'Dni ya registrado!'
                })
              }
            })
            
          }else{
            Swal.fire({
              type:'error',
              title:'Error!',
              text:'Complete todos los campos.'
            })
          }
        
      })
      
  })
}
const registrar=(information)=>{
  fetch(`${urlAjax}/API/teachers`,{
    method:'post',
    headers:{
      'Accept': 'application/json, text/plain, */*',
      'Content-Type': 'application/json; charset=UTF-8 '
    },
    body: JSON.stringify(information)
  })
  .then(res=>{
    if(res.ok){
      resetValuesForm()
      Swal.fire({
        type:'success',
        title:'Docente registrado!'
      })
      RESETJSON()
      tableTeacher()
    }else{
      Swal.fire({
        type:'info',
        title:'Status 500!',
        text:'Ocurrio un error'
      })
    }
  })
}


/**
 * AJAX PERFIL NAV
 */
const getPerfil=()=>{
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`${urlAjax}/API/admins/${idRegistro}`)
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



/**
 * AJAX CRUD TEACHERS
 */
const tableTeacher=(number=0)=>{
    const rellenar=document.querySelector('#myTable');
    rellenar.innerHTML='';
    fetch(`${urlAjax}/API/teachers/limit/${number}`)
    .then(res=>res.json())
    .then(data=>{
      for(let j of data){
        rellenar.innerHTML+=`
        <tr>
        <td>${j.lastName}</td>
        <td>${j.firstName}</td>
        <td>${j.email}</td>
        <td>${j.phone}</td>
        <td class="bg-white">
            <a id="${j.idUser}" href="#"><img src="assets/icon/eliminar.svg" style="width: 30px;"></a>
            <a class="ml-2" href="#" value="${j.id}" data-toggle="modal" data-target="#exampleModal">
                <img src="assets/icon/info.svg" style="width: 26px;">
            </a>
        </td>
        </tr>
        `;
        INFOJSON.push(j);
      }  
    })
}

/**
 * CREATE EVENT BROWSER IN INPUT-TEXT AND PRINT TABLE
 */
const eventBrowser=()=>{
    search.addEventListener('keyup',e=>{
        e.preventDefault();

        let DATABROWSER=[];
        let textSearch=search.value.toLowerCase();
        const rellenar=document.querySelector('#myTable');

        INFOJSON.forEach(element => {
            const firstname=element.firstName.toLowerCase();
            const lastname=element.lastName.toLowerCase();

            if(firstname.indexOf(textSearch)!=-1 || lastname.indexOf(textSearch)!=-1){
                DATABROWSER.push(element)
            }
        });

        if(DATABROWSER.length>0){
            rellenar.innerHTML='';
            DATABROWSER.forEach(element => {
                rellenar.innerHTML+=`
                <tr>
                <td>${element.lastName}</td>
                <td>${element.firstName}</td>
                <td>${element.email}</td>
                <td>${element.phone}</td>
                <td class="bg-white">
                    <a id="${element.idUser}" href="#"><img src="assets/icon/eliminar.svg" style="width: 30px;"></a>
                    <a class="ml-2" href="#" value="${element.id}" data-toggle="modal" data-target="#exampleModal">
                        <img src="assets/icon/info.svg" style="width: 26px;">
                    </a>
                </td>
                </tr>
                `;
            });
        }
    })
}



/**
 * CREATE EVENT BUTTONS FOR UPDATE AND DELETE
 * NOTE:: USING METHOD GET ->NOT SUPPORT INFINITYFREE PUT AND DELETE
 */
const AddEventButtonUD=()=>{
    tbody.addEventListener('click',e=>{
        e.preventDefault();
        if(typeof e.target.parentElement.attributes.id != 'undefined'){
          if(e.target.parentElement.attributes.id.value!= 'myTable'){
             Swal.fire({
               title: 'Eliminar!',
               text: "Esta seguro que desea eliminar!",
               type: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'si, eliminar!'
             }).then((result) => {
                if (result.value) {
                 let id=e.target.parentElement.attributes.id.value;
                 let nameEliminate='';
                 let idDelete='';
                 INFOJSON.forEach(element => {
                    if(element.idUser==id){
                        nameEliminate=element.firstName;
                        idDelete=element.id;
                    }
                 });
                 fetch(`${urlAjax}/API/teachers/delete/${idDelete}`)
                 .then(res=>{
                   if(res.ok){
                    fetch(`${urlAjax}/API/users/delete/${id}`)
                    .then(data=>{
                      if(data.ok){
                        return new Promise((resolve,fail)=>{
                          resolve(loader())
                        })
                        .then(function(){
                          Swal.fire(
                            'Exito!',
                            `Docente ${nameEliminate} Eliminado!`,
                            'success'
                          )
                        })
                      }else{
                        Swal.fire(
                          'Ocurrio un error!',
                          `no se elimino usuario!`,
                          'error'
                        )
                      }
                    })
                    
                   }else{
                    Swal.fire(
                      'status 500!',
                      `Ocurrio un error, no se elimino!`,
                      'error'
                    )
                   }
                 })
                 
               }
             })  
          }  
        }
        if(typeof e.target.parentNode.attributes.value !='undefined'){
          const s=e.target.parentNode.attributes.value.textContent;
          let infoFORM;
                 INFOJSON.forEach(element => {
                    if(element.id==s){
                        infoFORM=element;
                    }
                 });
          setAllInformation(infoFORM);
        } 
    })
}

/**
 * CREATE METHOD HTTP AJAX UPDATE PUT
 * NOTE::USE METHOD POST -> INFINITYFREE NOT SUPPORT PUT AND DELETE
 */
const updateTeacher=()=>{
    put.addEventListener('click',e=>{
        let datos={
          id:setId.value,
          codigo:setCodigo.value,
          firstName:setName.value,
          lastName:setLasName.value,
          phone:setContact.value,
          email:setEmail.value,
          idUser:setIdUser.value,
          sexo:setSexo.value,
          pass:setPassword.value
        }
        fetch(`${urlAjax}/API/teachers/${setId.value}`, {
          method: 'post',
          headers: {
            'Accept': 'application/json, text/plain, */*',
            'Content-Type': 'application/json; charset=UTF-8 '
          },
          body: JSON.stringify(datos)
        }).then(res=>res.json())
        .then(res=>console.log(res))
        .then(function(){
            RESETJSON()
            tableTeacher()
        })
        .then(Swal.fire({
          type:'success',
          title:'Exito!',
          text:'Datos Actualizados.'
          })
        
        );
        
    });
}


/**
 * CREATE PAGINATION TABLE
 */
const createPaginationOftable=()=>{
    let pages=0;
    pagination.innerHTML='';
    fetch(`${urlAjax}/API/teachers/count`)
    .then(res=>res.json())
    .then(data=>{
        for(let d of data){
            pages=d.total_teachers;
        }
    })
    .then(function(){
        pages=Math.ceil(pages/10);
        pagination.innerHTML+=`<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li> `;
            for(let i=0;i<pages;i++){
                pagination.innerHTML+=`
                <li class="page-item ${(i==0)?'':''}"><a class="page-link" href="#">${(i+1)}</a></li>
                `;
            }
        pagination.innerHTML+=`<li class="page-item disabled"><a class="page-link" href="#">Next</a></li> `;
    })
}

/**
 * CREATE FUNCTION EVENT FOR PAGINATION CLICK
 */
const AddEventPagination=()=>{
    pagination.addEventListener('click',e=>{
        e.preventDefault();
        let numberPress=parseInt(e.target.textContent);
        
        if(!isNaN(numberPress)){
            if(numberPress>1){
                numberPress=numberPress*10-10;
            }else{
                numberPress=0;
            }
            RESETJSON()
            tableTeacher(numberPress)
        }
    })
}


/**
 * CONTROLLER LOAD PAGE ADMIN
 */
const loader=()=>{
    if(typeof pageAdmin!="undefined"){
      if(pageAdmin==='inicio'){
        console.log('pagina de inicio');
      }else if(pageAdmin==='perfil'){
        getPerfil();
        updateInfoAdmin()
      }else if(pageAdmin==='configDocente'){
        addEventRegisterTeacher()
        tableTeacher();
        eventBrowser()
        createPaginationOftable()
        AddEventButtonUD()
        updateTeacher()
        AddEventPagination()
      }
    }
}
loader();