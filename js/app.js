let opcion = document.querySelector('#opcion');
let resultado = document.querySelector('#resultado');
let pag = document.querySelector('#navigation');
let db = [];
let pgTotal = 0;
let pgMin = 0;
let pgMax = 10;


function mostrarDB() {

  if(opcion.value === ""){ return; }

  createTable(opcion.value);
  obtenerDB(opcion.value);
}

function createTable(opcion = "*") {
  let exist = document.querySelector('.papas');

  if(exist){
    exist.remove();
  }

  let thead = document.createElement('thead');
  thead.classList.add('papas');

  switch(opcion){
    case "":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Hora</th>
        <th>Fecha</th>
        <th>Servicios</th>
      </tr>
      `;
      break;
    case "*":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Hora</th>
        <th>Fecha</th>
        <th>Servicios</th>
      </tr>
      `;
      break;
    case "nombre":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
      </tr>
      `;
      break;
    case "apellido":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Apellido</th>
      </tr>
      `;
      break;
    case "nombre, hora":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
        <th>Hora</th>
      </tr>
      `;
      break;
    case "nombre, fecha":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
        <th>Fecha</th>
      </tr>
      `;
      break;
    case "nombre, servicios":
      thead.innerHTML = `
      <tr class="text-center">
        <th>Nombre</th>
        <th>Servicios</th>
      </tr>
      `;
      break;
  }
  resultado.appendChild(thead);
}

async function obtenerDB(opcion) {
  if(opcion.value === '') return;

  // Obtener los valores de nuestra base de datos
  try{
    const resp = await fetch(`http://localhost/conexion-db/actions/obtenerDatos.php?opcion=${opcion}`);
    db = await resp.json();
  } catch (e){
    console.log(e); 
  }
  
  // Crear paginador
  createUIPaginador();

  // Mostrar Tabla
  mostrarResultados(opcion);
}

function mostrarResultados(opcion = "*") {
  let trBody = document.querySelector(".trbody");
  if(trBody){ trBody.remove(); }

  let tbody = document.createElement('tbody');
  tbody.classList.add('trbody');

  for(let i = pgMin; i <= pgMax; i++){
    if(!db[i]) { break; }

    let data = db[i];
    switch(opcion){
      case "*":
        tbody.innerHTML += `
        <tr>
            <td class="text-center">${data.nombre}</td>
            <td class="text-center">${data.apellido}</td>
            <td class="text-center">${data.hora}</td>
            <td class="text-center">${data.fecha}</td>
            <td class="text-center">${data.servicios}</td>
        </tr>
        `;    
        break;
      case "nombre":
        tbody.innerHTML += `
        <tr class="text-center">
            <td>${data.nombre}</td>
        </tr>
        `;    
        break;
      case "apellido":
        tbody.innerHTML += `
        <tr class="text-center">
            <td>${data.apellido}</td>
        </tr>
        `;    
        break;
      case "nombre, hora":
        tbody.innerHTML += `
        <tr class="text-center">
            <td>${data.nombre}</td>
            <td>${data.hora}</td>
        </tr>
        `;    
        break;
      case "nombre, fecha":
        tbody.innerHTML += `
        <tr class="text-center">
            <td>${data.nombre}</td>
            <td>${data.fecha}</td>
        </tr>
        `;    
        break;
      case "nombre, servicios":
        tbody.innerHTML += `
        <tr class="text-center">
            <td>${data.nombre}</td>
            <td>${data.servicios}</td>
        </tr>
        `;    
        break;
      default:
        tbody.innerHTML = '';
        break;
    }
  }

  resultado.appendChild(tbody);
}

function calcularPaginas(total){
  return Math.ceil( total / 10 );
}

function createUIPaginador(){
  
  // Calcular el numero de paginas
  pgTotal = calcularPaginas(db.length);
  
  // Validar de no duplicar paginación
  let pgCreated = document.querySelector('#paginationList');
  if( pgCreated ){
    pgCreated.remove();
  }

  // Crear Paginación
  let pgList = document.createElement('ul');
  pgList.classList.add('pagination');
  pgList.id = "paginationList";
    
  for(let i = 1; i <= pgTotal; i++){
    let pgActual = i-1;
    
    let pgListItem = document.createElement('li');
    pgListItem.classList.add('page-item');

    let pgListButton = document.createElement('a');
    pgListButton.textContent = i;
    pgListButton.href = "#";
    pgListButton.classList.add("page-link");
    pgListButton.onclick = () => changePaginador( (pgActual*10) , ((pgActual*10) + 10), pgListItem );

    pgListItem.appendChild(pgListButton);
    pgList.appendChild(pgListItem);
  }
  
  // Agregarle la clase active al primer resultado del paginador
  pgList.firstChild.classList.add('active');
  
  // Agregar los items del paginador
  pag.appendChild(pgList);
}

function changePaginador(min, max, active){

  // Eliminar la clase active a un valor existente
  let existActive = document.querySelector('li.active');
  if(existActive){
    existActive.classList.remove('active');
  }

  // Agregar clase activo al paginador seleccionado
  active.classList.add('active');

  // Cambiar los limites de nuestros resultados
  pgMin = min;
  pgMax = max;

  // Regargar resultados
  mostrarResultados(opcion.value);
}