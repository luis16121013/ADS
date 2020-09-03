const task=document.querySelectorAll('.task')

class Courses{
    constructor(){
    }
    number(m){
        if(m<10) return '0'+m
        else return m
    }
    setHeaderForm(information){//change name of register for admin
        formPOSTLabel.innerHTML=information; 
    }
    setDateTime(){
        let act = new Date()
        dateTask.value=`${ act.getFullYear() }-${ this.number(act.getMonth()+1) }-${ this.number(act.getDate()) }`
        timeTask.value=`${act.getHours()}:${this.number(act.getMinutes())}:${this.number(act.getSeconds())}`;
        //console.log(`${act.getHours()}:${this.number(act.getMinutes())}:${act.getSeconds()}`)
        postDescription.value=''
    }
    
}

course=new Courses()


task.forEach(element => {
    let id = element.attributes.value.value
    element.addEventListener('click',()=>{
        course.setHeaderForm(`Nueva Tarea de ${id}`)
        course.setDateTime()
    })
});

insertTask.addEventListener('click',()=>{
    console.log(dateTask.value)
})


