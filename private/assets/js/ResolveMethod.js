class ResolveMethod{
    constructor(){
        this.INFOJSON=[]
    }
    setHeaderForm(information){//change name of register for admin
      formPOSTLabel.innerHTML=information; 
    }
    getInformationFormPut(){//THIS METHOD RETURN OBJECT ADMINISTRADOR
        let usuario={
          idUser:inputIDUSER.value.toUpperCase(),
          dni:inputDni.value.toUpperCase(),
          phone:inputContacto.value.toUpperCase(),
          firstName:inputNombres.value.toUpperCase(),
          lastName:inputApellidos.value.toUpperCase(),
          email:inputEmail.value,
          pass:inputPassword.value,
          sexo:inputSexo.options[inputSexo.selectedIndex].value
        }
        return usuario
    }
    getInformationFormPost(){//THIS METHOD RETURN OBJECT ADMINISTRADOR FOR INSERT
        let usuario={
          dni:postDni.value.toUpperCase(),
          phone:postContact.value.toUpperCase(),
          firstName:postFirstName.value.toUpperCase(),
          lastName:postLastName.value.toUpperCase(),
          email:postEmail.value,
          pass:postPass.value,
          sexo:postSexo.options[postSexo.selectedIndex].value
        }
        return usuario
    }
    validateInformation(obj){//THIS METHOD VALID INFORMATION NULL
        let rpta=true;
        if(obj.dni==''||obj.phone==''||obj.firstName==''||obj.lastName==''||obj.email==''||obj.pass==''||obj.sexo==''){
          return false
        }else{
          return obj
        }
    }
    resetFormPost(){//RESTART FORM POST ORIGINAL VALUE NULL
        postDni.value='';
        postContact.value='';
        postContact.value='';
        postFirstName.value='';
        postLastName.value='';
        postEmail.value='';
        postPass.value='';
        postSexo.options[0].selected=true;
    }
    overWriteFormPut(p){//METHOD OVERWRITE INFORMATION FOR FORM UPDATE 
        inputIDUSER.value=p.idUser;
        inputID.value=p.id;
        inputCODIGO.value=p.codigo;
        inputDni.value=p.dni,
        inputNombres.value=p.firstName;
        inputApellidos.value=p.lastName;
        inputEmail.value=p.email;
        inputContacto.value=p.phone;
        inputPassword.value=p.pass;
        if(p.sexo=='M'){
          inputSexo.options[1].selected = true;
        }else{
          inputSexo.options[2].selected = true;
        }
    }
    resetINFOJSON(){//THIS METHOD DELETE ALL INFORMATION IN INFOJSON
        while(this.INFOJSON.length>0){
          this.INFOJSON.pop()
        }
    }
    getInformationOfJson(id){//THIS METHOD RETURN OBJECT FILTER JSONINFO
        let dato=this.INFOJSON.filter(d=>d.idUser==id)
        return dato[0]
    }

    async CreatePagination(model){//METHOD USE FOR CREATE PAGINATION IN TABLE
        const pagination=document.querySelector('#tablePagination');
        
        let pages=0;
        pagination.innerHTML='';

        const result = await fetch(`${urlAjax}/API/${model}/count`)
        const infoTable = await result.json()
        pages = infoTable[0].total_teachers
        pages = Math.ceil(pages/10);
        pagination.innerHTML+=`<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li> `;
            for(let i=0;i<pages;i++){
                pagination.innerHTML+=`
                <li class="page-item ${(i==0)?'':''}"><a class="page-link" href="#">${(i+1)}</a></li>
                `;
            }
        pagination.innerHTML+=`<li class="page-item disabled"><a class="page-link" href="#">Next</a></li> `;
    }
    ResolveLimitPage(limit){
        if(limit>1){
          limit=limit*10-10;
        }else{
            limit=0;
        }
        return limit
    }

    validateModelUser(number){//METHOD USE FOR VALIDATE EXISTS DNI REGISTER
        return fetch(`${urlAjax}/API/users/validate/${number}`)
        .then(res=>res.json())
        .then(json =>json)
    }

    RegisterUser(model,info){
        return fetch(`${urlAjax}/API/${model}`,{
          method:'post',
          body:JSON.stringify(info),
          headers:{
            'Content-Type':'application/json'
          }
        }).then(res=>res.ok?Promise.resolve(res):Promise.reject(res))
        .then(res=>res.json())
        .then(res=>res)
    }

    DeleteUser(model,idUser){
        return fetch(`${urlAjax}/API/${model}/delete/${idUser}`)
        .then(res=>res.ok ? Promise.resolve(res):Promise.reject(res))
        .then(res=>res.json())
        .then(res=>res)
    }

    UpdateUser(model,info){
        return fetch(`${urlAjax}/API/${model}/update`,{
          method:'post',
          body:JSON.stringify(info),
          headers:{
            'Content-Type':'application/json'
          }
        }).then(res=>res.ok?Promise.resolve(res):Promise.reject(res))
        .then(res=>res.json())
        .then(res=>res)
    }

    FilterTable(){
        let DATABROWSER=[];
          let textSearch=inputBrowser.value.toLowerCase();
          this.INFOJSON.forEach(element => {
              const firstname=element.firstName.toLowerCase();
              const lastname=element.lastName.toLowerCase();
              if(firstname.indexOf(textSearch)!=-1 || lastname.indexOf(textSearch)!=-1){
                  DATABROWSER.push(element)
              }
          });
        return DATABROWSER;
    }

}