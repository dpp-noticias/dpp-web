const addUsuario = document.querySelector('.insertar');
const nombreUsuario = document.getElementById('nombreUser').value
const correo = document.getElementById('correo').value
const contrasena = document.getElementById('contrasena').value
const rol = document.getElementById('rol').value
const divErrores = document.getElementById('errores')



const url = "https://dppproject.000webhostapp.com/usuarios.php";

addUsuario.addEventListener('submit', async e => {
    e.preventDefault();

        const datos = new FormData(addUsuario)
        
        fetch(url, {
            method: "POST",
            body:datos
        })
            .then(res => res.json())
            .then(data => {
                if(data.status === "error") {
                    // console.log(data.result.errir_msg)
                    addUsuario.insertAdjacentHTML("afterend",`<p>${data.result.error_msg.join('')}</p>`)

                }else {
                    alert("Exito")
                }
                // console.log(data)
            })
        // if (!e.target.id.value) {
        //     try {
        //         let options = {
        //             method: "POST",
        //             body:datos,
        //         },

        //         res = await fetch(url,options),
        //         json = await res.json();
        //         if(!res.ok) throw {status:res.status,statusText:res.statusText}
        //     } catch (errores) {
        //         console.log(errores)
        //         // json = JSON.parse(errores);
        //         // var decodedString = String.fromCharCode.apply(null, new Uint8Array(datos));
        //         // let message= error.statusText || "Ocurrio un error"
        //         // addUsuario.insertAdjacentHTML("afterend",`<p>Error ${error.status}: ${message}</p>`)
        //     }
        // }
    // }

    
})


