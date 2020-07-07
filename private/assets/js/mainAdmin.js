console.log(idRegistro);
const getDataAdmin=()=>{
    const registro=document.querySelector('#content-perfil-user');
    registro.innerHTML='';
    fetch(`http://192.168.0.4/ADS/api/users/admins/${idRegistro}`)
    .then(res=>res.json())
    .then(data=>{
        for(let v of data){
            registro.innerHTML+=`
            <p><strong>Nombre: </strong>${v.firstName}</p>
            <p><strong>Apellido: </strong>${v.lastName}</p>
            <p><strong>Contacto: </strong>${v.phone}</p>
            <p><strong>Cargo: </strong>${v.cargo}</p>
            <p><strong>Email: </strong>${v.Email}</p>
            `;
        }
    })
}
getDataAdmin();