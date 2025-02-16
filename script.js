const showbtn = document.querySelector('.showbtn')
const formCont = document.querySelector('.form-hide-cont')
const hideForm = document.querySelector('.hide')

showbtn.onclick = () =>{
    console.log(123)
    formCont.classList.add('showForm')
}

hideForm.onclick = () =>{
    formCont.classList.remove('showForm')
}

// if(formCont.classList.add('showForm')){
//     showbtn.innerHTML = "hide form"
// }
