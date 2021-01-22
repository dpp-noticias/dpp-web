// const addUsuario = document.querySelector('.insertar');

// const url = "http://localhost/apidpp/registrar.php";

// addUsuario.addEventListener('submit', async e => {
//     e.preventDefault();

//     const datos = new FormData(addUsuario)

//     fetch(url, {
//         method: "POST",
//         body: datos
//     })
//         .then(res => res.json())
//         .then(data => {
//             if (data.status === "error") {
//                 // console.log(data.result.errir_msg)
//                 // const ul= document.getElementById('ulErrores');
//                 // const li = document.createElement('li');
//                 // li.innerHTML=data.result.error_msg.join('')
//                 // ul.appendChild(li)
//                 addUsuario.insertAdjacentHTML("afterend", `<p>${data.result.error_msg.join('')}</p>`)

//             } else {
//                 alert("Exito")
//             }
//         })
// });


const loginUsuario = document.querySelector('.login');

const url2 = "http://localhost/apidpp/login.php";

loginUsuario.addEventListener('submit', async e => {
    e.preventDefault();

    const datos2 = new FormData(loginUsuario)

    fetch(url2, {
        method: "POST",
        body: datos2
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "error") {
                // console.log(data.result.errir_msg)
                const ul= document.getElementById('ulErrores');
                const li = document.createElement('li');
                li.innerHTML=data.result.error_msg.join('')
                ul.appendChild(li)
                // loginUsuario.insertAdjacentHTML("afterend", `<p>${data.result.error_msg.join('')}</p>`)

            } else {
                alert("Exito")
            }
        })
})


