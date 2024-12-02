const SelecTable = {
  id: '',
  fecha: '',
  hora: '',
  name: '',
  tables: []
}
const baseImageUrl = '/ImagenBD/';

document.addEventListener('DOMContentLoaded', function() {
  eventListeners();
  checkScreenSize(); 
  darkMode();
  consultarApi(); 
  startapp(); 
  assignUserId()
  CustomerName()
  ClientDate()
  UpdateArray()
  TimeDate()
  mostrarAlerta()
  ShowSummary()
  uploadImage() 
});

function mostrarAlerta(tipo, mensaje, contenedorId) {
  const alertaDiv = document.createElement('div');
  alertaDiv.classList.add('alerta', tipo);
  alertaDiv.textContent = mensaje;

  const contenedorAlertas = document.getElementById(contenedorId);
  if (contenedorAlertas) {
      contenedorAlertas.appendChild(alertaDiv);

      setTimeout(() => {
          alertaDiv.remove();
      }, 7000);
  }
}

let step = 1;

const startapp = () => {
  ShowSection(); 
  tabs(); 
}

// Mostrar la sección actual
const ShowSection = () => {
  // Ocultamos todas las secciones
  const secciones = document.querySelectorAll('.seccion');
  secciones.forEach(seccion => {
    seccion.classList.remove('Show'); 
  });

  // Luego mostramos la sección actual
  const seccionActual = document.querySelector(`#Step-${step}`);
  seccionActual.classList.add('Show'); // Mostrar la sección actual

  // Quitar el step anterior
  const tabFormer = document.querySelector('.Current');
  if (tabFormer) {
    tabFormer.classList.remove('Current');
  }

  // Resaltar el tab
  const tab = document.querySelector(`[data-step="${step}"]`);
  tab.classList.add('Current');
}

// Configura los eventos de los tabs
const tabs = () => {
  const botones = document.querySelectorAll('.tabs button');
  botones.forEach(boton => {
    boton.addEventListener('click', function(e) {
      step = parseInt(e.target.dataset.step);

      if ( step === 3 ) {
        UpdateArray()
        ShowSummary()
      }

      ShowSection(); 
    });
  });
}

// Menu mobile
function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', navegacionResponsive);

  window.addEventListener('resize', checkScreenSize);

  const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
  metodoContacto.forEach(input => input.addEventListener('click', MetodosContacto));
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');
  navegacion.classList.toggle('mostrar');
}

function checkScreenSize() {
  const navegacion = document.querySelector('.navegacion');
  
  // Si la pantalla es más grande que 768px, eliminamos la clase 'mostrar'
  if (window.innerWidth >= 768) {
    navegacion.classList.remove('mostrar');
  }
}

//DARK MODE  
const darkMode = () => {
  const preference = window.matchMedia('(prefers-color-scheme: dark)'); /// Leer preferecnias

  // Aplicar el tema según la preferencia inicial del sistema
  if (preference.matches) {
    document.body.classList.add('DarkMode-function');
  } else {
    document.body.classList.remove('DarkMode-function');
  }

  // Escuchar los cambios en las preferencias del sistema
  preference.addEventListener('change', function() {
    if (preference.matches) {
      document.body.classList.add('DarkMode-function');
    } else {
      document.body.classList.remove('DarkMode-function');
    }
  });

  // Seleccionar el input checkbox
  const botonDarkMode = document.querySelector('#darkModeToggle');

  // Verificar si el checkbox está marcado o no
  botonDarkMode.addEventListener('change', function() {
    if (botonDarkMode.checked) {
      document.body.classList.add('DarkMode-function');
    } else {
      document.body.classList.remove('DarkMode-function');
    }
  });
};

// Function slide
const imagesContainer = document.querySelector('.carousel-images');
const images = document.querySelectorAll('.carousel-images img');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
let currentIndex = 0;
const intervalTime = 10000; // 10 segundos

function updateCarousel() {
  const imageWidth = images[0].clientWidth; 
  imagesContainer.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
}

function nextImage() {
  currentIndex = (currentIndex + 1) % images.length;
  updateCarousel();
}

function prevImage() {
  currentIndex = (currentIndex - 1 + images.length) % images.length;
  updateCarousel();
}

nextButton.addEventListener('click', () => {
  nextImage();
  clearInterval(carouselInterval); 
});

prevButton.addEventListener('click', () => {
  prevImage();
  clearInterval(carouselInterval); 
});

let carouselInterval = setInterval(nextImage, prevImage, intervalTime);

prevButton.addEventListener('click', () => {
  clearInterval(carouselInterval);
  carouselInterval = setInterval(prevImage, intervalTime); 
});
nextButton.addEventListener('click', () => {
  clearInterval(carouselInterval);
  carouselInterval = setInterval(nextImage, intervalTime); 
});


window.addEventListener('resize', updateCarousel);
updateCarousel();  

async function consultarApi() { 
  try {
    const url = `/api/Reservation`;
    const resultado = await fetch(url);

    if (!resultado.ok) {
      const errorText = await resultado.text();  
      throw new Error(`Error en la solicitud: ${resultado.status}, ${errorText}`);
    }

    const tables = await resultado.json();
    //console.log(tables); 

    ShowTables(tables); 
  } catch (error) {
   // console.error('Error al consultar la API:', error);
  }
}

function ShowTables(tables) {
  const mesaContainer = document.querySelector('#Mesas');
  mesaContainer.innerHTML = '';

  tables.forEach(table => {
      const { id, descripcion, imagen } = table;

      const nameTable = document.createElement('P');
      nameTable.classList.add('nameTable');
      nameTable.textContent = descripcion;

      const tableImage = document.createElement('img');
      tableImage.classList.add('tableimage');
      tableImage.src = `${baseImageUrl}${imagen}`;
      tableImage.alt = `Imagen de la mesa ${id}`;

      const divTable = document.createElement('DIV');
      divTable.classList.add('DivTable');
      divTable.dataset.idTable = id;

      divTable.appendChild(tableImage);
      divTable.appendChild(nameTable);

      divTable.addEventListener('click', () => SelectTable(table));

      mesaContainer.appendChild(divTable);
  });
}


function UpdateArray() {
  document.querySelector('#fecha').addEventListener('input', function(e) {
    SelecTable.fecha = e.target.value; 
    //console.log(SelecTable); 
  });

  document.querySelector('#hora').addEventListener('input', function(e) {
    SelecTable.hora = e.target.value; 
    //console.log(SelecTable); 
  });

  document.querySelector('#nombre').addEventListener('input', function(e) {
    SelecTable.name = e.target.value; 
    //console.log(SelecTable); 
  });
}

function SelectTable(table) {
  const { id } = table;
  const { tables } = SelecTable;

  const divServicio = document.querySelector(`[data-id-table="${id}"]`);

  if (tables.length > 0) {
    const mesaSeleccionada  = tables[0];
    const divSeleccionado  = document.querySelector(`[data-id-table="${mesaSeleccionada.id}"]`);

    divSeleccionado.classList.remove('DivSelectTable');

    SelecTable.tables = [];
  }

  SelecTable.tables.push(table);
  divServicio.classList.add('DivSelectTable')

  //console.log(SelecTable)
}

function assignUserId() {
  const idElement = document.querySelector('#id'); 

  if (idElement && idElement.value) {
    SelecTable.id = idElement.value; 
    //console.log("ID de usuario asignado:", SelecTable.id);
  } else {
    //console.error("No se pudo encontrar el campo de ID del usuario.");
  }
}


document.addEventListener("DOMContentLoaded", () => {
  assignUserId(); 
  UpdateArray();   
});


function CustomerName() {
  const nombreElement = document.querySelector('#nombre');
  
  if (nombreElement) {
    SelecTable.name = nombreElement.value; 
  } else {
    //console.error('El campo de nombre no se encuentra');
  }
}

function ClientDate() {
  const inputDate = document.querySelector('#fecha');

  if (inputDate) {
    inputDate.addEventListener('input', function() {
      SelecTable.fecha = inputDate.value;
    });
  } else {
    //console.error('El campo de fecha no se encuentra');
  }
}

function TimeDate() {
  const inputDate = document.querySelector('#hora');

  inputDate.addEventListener('input', function(e) {
    const selectedTime = inputDate.value; 
    const Hour = parseInt(selectedTime.split(":")[0], 10); 

    if (Hour < 9 || Hour > 20) {
      mostrarAlerta('error', "El establecimiento está cerrado a esta hora. Por favor, selecciona una hora entre las 09:00 am y 08:00 pm.", 'alertas-step-2');
      e.target.value = ""; 
  } else {
      SelecTable.hora = selectedTime; 
  }
  });
}


function ShowSummary() {
  const Summary = document.querySelector('#ShowSummary');

  const isDataComplete = SelecTable.fecha && SelecTable.hora && SelecTable.name && SelecTable.tables.length > 0;

  if (!isDataComplete) {
    //console.log('Hacen falta datos');
    mostrarAlerta('error', 'Por favor, asegúrate de que todos los campos estén completos.', 'alertas-step-3');
  } else {
    mostrarAlerta('success', 'Todos los datos están llenos Por favor verifique sus datos', 'alertas-step-3');
    
    Summary.innerHTML = `
      <p><strong>Tú reservación es a nombre de:</strong> ${SelecTable.name}</p>
      <p><strong>Tú reservación es el:</strong> ${SelecTable.fecha}</p>
      <p><strong>Tú reservación es a las:</strong> ${SelecTable.hora}</p>
      <p><strong>Tú mesa es una </strong> ${SelecTable.tables[0].descripcion}</p>
      <button class="ConfirmReservation">Confirmar Reservación</button>
    `;

    Summary.classList.add("ShowSummary");
    const confirmButton = Summary.querySelector('.ConfirmReservation');
    confirmButton.addEventListener('click', () => {
      ConfirmarReservacion();
    }); 
  }
}

async function ConfirmarReservacion() {
  const idTables = SelecTable.tables.map(table => table.id);

  const data = new FormData();
  data.append('fecha', SelecTable.fecha);
  data.append('hora', SelecTable.hora);
  data.append('usuarioid', SelecTable.id); 

  if (idTables.length > 0) {
    data.append('mesaid', idTables[0]); 
  } else {
    //console.error("No se ha seleccionado ninguna mesa.");
    mostrarAlerta('error', "Por favor selecciona una mesa para confirmar tu reservación.");
    return; 
  }

  const url = '/api/ReservationConfirmed';
  try {
    const answer = await fetch(url, {
      method: 'POST',
      body: data
    });

    const Result = await answer.json();
    if (Result) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Reservación creada con exito",
        showConfirmButton: false,
        timer: 1500
      }).then( () => {
        window.location.reload()
      });
    } 
  } catch (error) {
    if (error) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error al confimar reservación",
      });
    };
  }
}

//CARGAR IMAGEN
function uploadImage() { 
  const inputFile = document.getElementById('imagen');
  const imgPreview = document.querySelector('.ImageUpload'); 

  if (!inputFile || !imgPreview) {
    //console.error("No se encontró el input o la vista previa de la imagen.");
    return;
  }

  inputFile.addEventListener('change', function (e) {
    const file = e.target.files[0]; 

    if (file) {
      const reader = new FileReader();

      reader.onload = function (event) {
        imgPreview.src = event.target.result; 
        imgPreview.alt = "Vista previa de la imagen"; 
      };

      reader.readAsDataURL(file); 
    } else {
      imgPreview.src = "Image/Fondoncio.png"; 
      imgPreview.alt = "Haz clic para subir una imagen";
    }
  });
}
