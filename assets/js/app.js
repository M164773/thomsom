function registrarBotellas(){
    let cliente = document.getElementById("clientes").value
    let cantidad = document.getElementById("cantidadBotellas").value

    if(!cliente || !cantidad){
        alert("Asegúrese de que todos los campos han sido llenados.")
        return
    }
    if(cantidad<1 || cantidad>999999){
        alert("La cantidad de botellas debe ser entre 1 y 999999.")
        return
    }

    $.ajax({
        url: 'assets/php/insertarBotellas.php',
        type: 'POST',
        data: {cliente, cantidad},
        success: function(response){
            console.log(response)
            mostrarRegistros()
        }
    })
}

function registrarClientes(){
    let cedula = document.getElementById("cedula").value
    let nombre = document.getElementById("nombre").value
    let ubicacion = document.getElementById("ubicacion").value

    if(!cedula || !nombre || !ubicacion){
        alert("Asegúrese de que todos los campos del cliente han sido llenados.")
        return
    }

    if(cedula<1000000 || cedula>40000000){
        alert("Asegúrese de ingresar una cédula válida.")
        return
    }

    $.ajax({
        url: 'assets/php/insertarClientes.php',
        type: 'POST',
        data: {cedula, nombre, ubicacion},
        success: function(response){
            console.log(response)
            mostrarClientesSelect()
            mostrarClientes()
        }
    })
}

$(function(){
    $('#buscar').keyup(function(){
        let buscar = $('#buscar').val()
        $.ajax({
            url: 'assets/php/buscarBotellas.php',
            type: 'POST',
            data: {buscar},
            success: function(response){
                // let entregas = JSON.parse(response)
                console.log(response)
                // console.log(entregas)
            }
        })
    })
})

function mostrarClientes(){
    $.ajax({
        url: 'assets/php/buscarClientes.php',
        type: 'GET',
        success: function(response){
            let clientes = JSON.parse(response)
            let template = ""
            if(clientes.length === 0){
                template = `
                    <tr></tr>
                `
                $("#bodyClientes").html(template)
            }
            clientes.forEach(cliente => {
                template+=`
                    <tr>
                        <td>${cliente.cedula}</td>
                        <td>${cliente.nombre}</td>
                        <td>${cliente.ubicacion}</td>
                        <td><button type="button" class="btn btn-danger" onclick="borrarCliente(${cliente.cedula})"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                `
                $("#bodyClientes").html(template)
            })
        }
    })
}

function mostrarClientesSelect(){
    $.ajax({
        url: 'assets/php/buscarClientes.php',
        type: 'GET',
        success: function(response){
            let clientes = JSON.parse(response)
            let template = ""
            clientes.forEach(cliente => {
                template+=`<option value="${cliente.cedula}"> ${cliente.nombre} (${cliente.cedula}) </option>`
            })
            $("#clientes").html(template)
        }
    })
}

function mostrarRegistros(){
    $.ajax({
        url: 'assets/php/buscarBotellas.php',
        type: 'GET',
        success: function(response){
            let registros = JSON.parse(response)
            let template = ""
            if(registros.length === 0){
                template = `
                    <tr></tr>
                `
                $("#bodyRegistros").html(template)
                return
            }
            registros.forEach(registro => {
                template+=`
                    <tr>
                        <td>${registro.id}</td>
                        <td>${registro.cantidad}</td>
                        <td>${registro.hora_entrega}</td>
                        <td>${registro.fecha_entrega}</td>
                        <td>${registro.cedula_cliente}</td>
                        <td>${registro.ubicacion}</td>
                        <td><button type="button" class="btn btn-danger" onclick="borrarRegistro(${registro.id})"><i class="bi bi-trash-fill"></i></button></td>
                    </tr>
                `
                $("#bodyRegistros").html(template)
            })
        }
    })
}

function borrarCliente(c){
    $.ajax({
        url: 'assets/php/borrarCliente.php',
        type: 'POST',
        data: {c},
        success: function(response){
            console.log(response)
            mostrarClientes()
            mostrarClientesSelect()
            mostrarRegistros()
        }
    })
}

function borrarRegistro(i){
    $.ajax({
        url: 'assets/php/borrarRegistro.php',
        type: 'POST',
        data: {i},
        success: function(response){
            console.log(response)
            mostrarRegistros()
        }
    })
}

function generarClientesPDF(){
    $.ajax({
        url: 'assets/php/generarClientesPDF.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/generarClientesPDF.php')
        }
    })
}

function generarRegistrosPDF(){
    $.ajax({
        url: 'assets/php/generarRegistrosPDF.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/generarRegistrosPDF.php')
        }
    })
}