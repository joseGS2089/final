cargarDatos ();
function cargarDatos () {
    fetch('prueba.php')
    .then(response => response.json())
    .then(data => {
        const tablaDatos = document.getElementById ('tablaDatos');
        tablaDatos.innerHTML ="";
        data.forEach(row=> {
            const tr = document.createElement("tr");
            tr.innerHTML = 
            ` <td>${row.id}</td>
              <td>${row.nombre}</td>
              <td>${row.descripcion} </td>
              <td>${row.acciones}</td> `;
            tablaDatos.appendChild(tr);
            
        });   
    });
}