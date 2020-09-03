class Alert{
    static success(title){
      Swal.fire({ type:'success', title})
    }
    static errorr(title){
      Swal.fire({ type:'error', title})
    }
    static info(title){
      Swal.fire({ type:'info', title})
    }
    static delete(){
      return Swal.fire({
        title: 'Eliminar!',
        text: "Esta seguro que desea eliminar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, eliminar!'
      })
    }
    static update(){
      return Swal.fire({
        title: 'Actualizar!',
        text: "Esta seguro que desea actualizar?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si!'
      })
    }
}