
class TableAdmin extends ResolveMethod{
    constructor(){
      super()
      this.setHeaderForm('Registro Administrador')
    }

    loadTable(number=0){//load data by API
      if(this.INFOJSON.length>0)this.resetINFOJSON()
        myTable.innerHTML='';
        fetch(`${urlAjax}/API/admins/limit/${number}`)
        .then(res=>res.json())
        .then(data=>{
          for(let j of data){
            myTable.innerHTML+=`
            <tr>
            <td>${j.lastName}</td>
            <td>${j.firstName}</td>
            <td>${j.email}</td>
            <td>${j.phone}</td>
            <td class="bg-white">
                <a id="${j.idUser}" href="#"><img src="assets/icon/eliminar.svg" style="width: 30px;"></a>
                <a class="ml-2" href="#" value="${j.idUser}" data-toggle="modal" data-target="#exampleModal">
                    <img src="assets/icon/info.svg" style="width: 26px;">
                </a>
            </td>
            </tr>
            `;
            this.INFOJSON.push(j);
          }  
        })
    }

    updateInformation(obj){// UPDATE INFO BY APIREST
      fetch(`${urlAjax}/API/admins/update`,{
        method:'post',
        body:JSON.stringify(obj),
        headers:{
          'Content-Type':'application/json'
        }
      }).then(res=>res.ok ? Promise.resolve(res):Promise.reject(res))
      .then(res=>res.json())
      .then(res=>{ if(res) Alert.success('Informacion Actualizada!') })
      .then(function(){ admin.resetINFOJSON() })
      .then(function(){ admin.loadTable() })
    }

    validateInformation(obj){//THIS METHOD VALID INFORMATION NULL
      let rpta=true;
      if(obj.dni==''||obj.phone==''||obj.firstName==''||obj.lastName==''||obj.email==''||obj.pass==''||obj.sexo==''){
        return false
      }else{
        return obj
      }
    }

    insertAdmin(obj){//METHOD FOR REGISTER ADMIN IN BBDD 
      fetch(`${urlAjax}/API/admins`,{
        method:'post',
        body:JSON.stringify(obj),
        headers:{
          'Content-Type':'application/json'
        }
      }).then(res=>res.ok ? Promise.resolve(res) : Promise.reject(res))
      .then(res=>res.json())
      .then(res=>{ 
        if(res) Alert.success('Administrador registrado!') 
        else Alert.errorr('No se pudo registrar!')
      })
      .then(function(){ admin.resetINFOJSON() })
      .then(function(){ admin.loadTable() })
      .then(function(){ admin.resetFormPost() })
    }

    deleteAdmin(obj){//METHOD FOR DELETE ADMIN IN BBDD
      fetch(`${urlAjax}/API/admins/delete/${obj.idUser}`)
      .then(res=>res.ok ? Promise.resolve(res):Promise.reject(res))
      .then(res=>res.json())
      .then(res=>{
        if(res) Alert.success(`Administrador ${obj.firstName} eliminado!`) 
        else Alert.errorr('No se pudo Eliminar!')
      })
      .then(function(){ admin.resetINFOJSON() })
      .then(function(){ admin.loadTable() })
    }
}

admin=new TableAdmin()
admin.loadTable()

myTable.addEventListener('click',e=>{//ADD EVENT IN COLUMN OPTIONS OF TABLE FOR::GET-INFORMATION BY EVENT
    e.preventDefault();
    if(typeof e.target.parentElement.attributes.id != 'undefined'){
      if(e.target.parentElement.attributes.id.value!= 'myTable'){
        Alert.delete()
        .then((result) => {
          if (result.value) {
            const IDUSER=e.target.parentElement.attributes.id.value;
            const people=admin.getInformationOfJson(IDUSER)
            admin.deleteAdmin(people)
          }
        })
      }
    }
    if(typeof e.target.parentNode.attributes.value !='undefined'){
      const r=e.target.parentNode.attributes.value.textContent;
      const info=admin.getInformationOfJson(r)
      admin.overWriteFormPut(info)     
    } 
})

update.addEventListener('click',e=>{//ADD EVENT IN BUTTON FOR UPDATE BY APIREST
  e.preventDefault()
  const infoAdmin=admin.getInformationFormPut()
  if(admin.validateInformation(infoAdmin)){
    admin.updateInformation(infoAdmin)
    admin.loadTable()
  }else{Alert.errorr('Complete todos los campos!')}
})

insert.addEventListener('click',e=>{//ADD EVENT IN BUTTON FOR INSERT BBDD BY APIREST
  e.preventDefault()
  const infoAdmin=admin.getInformationFormPost()
  if(admin.validateInformation(infoAdmin)){
    admin.insertAdmin(infoAdmin)
  }else{Alert.errorr('Complete todos los campos!')}
})
