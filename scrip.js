const formLogin = document.getElementById('form-login');
const btnLogin = document.getElementById('btn-login');

btnLogin.addEventListener('click', (e) => {
e.preventDefault();
const nombre = document.getElementById('nombre').value;
const contraseña = document.getElementById('contraseña').value;

// Verificar si el nombre y contraseña coinciden con la información de la base de datos
fetch('verificar.php', {
method: 'POST',
headers: {
'Content-Type': 'application/json'
},
body: JSON.stringify({ nombre, contrasenia })
})
.then(response => response.json())
.then(data => {
if (data.exito) {
// Verificar si es administrador o usuario
if (data.rol === 'administrador') {
// Redirigir a la página de administrador
window.location.href = 'admin.html';
} else if (data.rol === 'usuario') {
// Redirigir a la página de usuarios
window.location.href = 'usuario.html';
}
} else {
// Datos incorrectos
alert('Datos incorrectos. Por favor, inténtelo de nuevo.');
}
})
.catch(error => console.error(error));
});