
class Teacher extends ResolveMethod{
    constructor(){
        super()
        this.NumberPageLocation=0
        this.setHeaderForm('Registro Docente')
    }
    loadTable(number=0){//load data by API
        if(this.INFOJSON.length>0)this.resetINFOJSON()
        myTable.innerHTML='';
        fetch(`${urlAjax}/API/teachers/limit/${number}`)
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

    async registerTeacher(obj){
      try{
        const validation = await this.validateModelUser(obj.dni)
        if(validation){
            const success = await this.RegisterUser('teachers',obj)
            if(success){ 
              Alert.success('Docente Registrado')
              teacher.loadTable()
              this.resetFormPost()
            }else{ Alert.errorr('Error, no se registro!') }
        }else{
          Alert.info('Dni ya registrado')
        }
      }catch(err){
        console.log(err)
      }
    }

    async deleteTeacher(obj){
      try{
          const resTeacher = await this.DeleteUser('teachers',obj.idUser)
          if(resTeacher){
            const resUser = await this.DeleteUser('users',obj.idUser)
            if (resUser) { 
              Alert.success(`Docente ${obj.firstName} eliminado!`)
              teacher.loadTable()
            }else{ Alert.errorr('No se eliminó el usuario!') }
          }else{ Alert.errorr('No se eliminó el Docente!') }
      }catch(err){
        console.log(err)
      }
    }

    async updateTeacher(obj){
      try{
          const resTeacher = await this.UpdateUser('teachers',obj)
          if(resTeacher){ 
            Alert.success(`Informacion Actualizada!`)
            teacher.loadTable(teacher.NumberPageLocation)
          }else{ Alert.errorr('No se Actualizo!') }
      }catch(err){
        console.log(err)
      }
    }

    browseInformation(){
        const data = this.FilterTable()
        if(data.length>0){
          myTable.innerHTML='';
          data.forEach(element => {
            myTable.innerHTML+=`
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
    }

}

teacher= new Teacher()
teacher.loadTable()
teacher.CreatePagination('teachers')

myTable.addEventListener('click',e=>{//ADD EVENT IN COLUMN OPTIONS OF TABLE FOR::GET-INFORMATION BY EVENT
    e.preventDefault();
    if(typeof e.target.parentElement.attributes.id != 'undefined'){
      if(e.target.parentElement.attributes.id.value!= 'myTable'){
        Alert.delete()
        .then((result) => {
          if (result.value) {
            const IDUSER=e.target.parentElement.attributes.id.value;
            const people=teacher.getInformationOfJson(IDUSER)
            teacher.deleteTeacher(people)
          }
        })
      }
    }
    if(typeof e.target.parentNode.attributes.value !='undefined'){
      const r=e.target.parentNode.attributes.value.textContent;
      const info=teacher.getInformationOfJson(r)
      teacher.overWriteFormPut(info)   
    } 
})

update.addEventListener('click',e=>{//ADD EVENT IN BUTTON FOR UPDATE BY APIREST
    e.preventDefault()
    const infoTeacher=teacher.getInformationFormPut()
    //if(teacher.validateInformation(infoTeacher)){
      teacher.updateTeacher(infoTeacher)
    //}else{Alert.errorr('Complete todos los campos!')}
})
  
insert.addEventListener('click',e=>{//ADD EVENT IN BUTTON FOR INSERT BBDD BY APIREST
    e.preventDefault()
    const infoTeacher=teacher.getInformationFormPost()
    if(teacher.validateInformation(infoTeacher)){
      teacher.registerTeacher(infoTeacher)
    }else{Alert.errorr('Complete todos los campos!')}
})

inputBrowser.addEventListener('keyup',e=>{
  e.preventDefault()
    teacher.browseInformation()
})

tablePagination.addEventListener('click',e=>{
  e.preventDefault()
  let numberPress=parseInt(e.target.textContent);    
  if(!isNaN(numberPress)){
    teacher.NumberPageLocation=teacher.ResolveLimitPage(numberPress)
    teacher.loadTable(teacher.NumberPageLocation)
  }
})