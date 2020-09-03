
class Perfil{
  constructor(){
    this.idUser=''
    this.loadPerfil() 
  }
  loadPerfil(){//METHOD FOR LOAD PERFIL ADMIN
    const registro=document.querySelector('#listado-datos');
    registro.innerHTML='';
    fetch(`${urlAjax}/API/admins/${idRegistro}`)
    .then(res=>res.json())
    .then(data=>{
        for(let v of data){
            registro.innerHTML+=`
              <li class="list-group-item">
                <b class="text-primary">Dni </b> <a class="float-right">${v.dni}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Nombre </b> <a class="float-right">${v.firstName}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Apellido</b> <a class="float-right">${v.lastName}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Contacto</b> <a class="float-right">${v.phone}</a>
              </li>
              <li class="list-group-item">
                <b class="text-primary">Email</b> <a class="float-right">${v.email}</a>
              </li>
            `;  
        }
        this.idUser=data[0].idUser
    })
  }
  updatePerfil(obj){//METHOD FOR UPDATE PERFIL BY APIREST
    fetch(`${urlAjax}/API/admins/update/perfil/${this.idUser}`,{
      method:'post',
      body:JSON.stringify(obj),
      headers:{
        'Content-Type':'application/json'
      }
    }).then(res=>res.ok?Promise.resolve(res):Promise.reject(res))
    .then(res=>res.json())
    .then(res=>{ if(res) Alert.success(`Actualizado!`) })
    .then(function(){ perfil.loadPerfil() })
    .then(function(){ perfil.resetFormPerfil() })
  }
  resetFormPerfil(){//METHOD FOR RESET INFORMATION OF FORM PERFIL
    inputEmail.value=''
    inputContact.value=''
    inputPass.value=''
  }

}
perfil=new Perfil()


updatePerfil.addEventListener('click',e=>{
  e.preventDefault();
  Alert.update()
  .then(res=>{
    if (res.value){
      let admin={
        email:inputEmail.value,
        phone:inputContact.value,
        pass:inputPass.value
      }
      perfil.updatePerfil(admin)
    } 
  })
})


