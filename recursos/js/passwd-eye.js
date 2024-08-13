document.addEventListener('DOMContentLoaded', () => {
    console.log('JavaScript cargado correctamente'); // Verifica si aparece en la consola
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.querySelector('.btn-toggle-password');
    const eyeIcon = document.getElementById('eye-icon');

    togglePasswordButton.addEventListener('click', () => {
        // Cambia el tipo del campo de contraseña
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        // Cambia la imagen del botón
        if (type === 'password') {
            eyeIcon.src = '../recursos/img/eye.png'; // Imagen para "ocultar"
        } else {
            eyeIcon.src = '../recursos/img/eye-slash.png'; // Imagen para "mostrar"
        }
    });
});
