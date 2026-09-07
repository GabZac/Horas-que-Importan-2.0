document.addEventListener("DOMContentLoaded", () => {
    const ESP32_IP = "http://192.168.1.50"; 

    // Referencias DOM
    const statusTexto = document.getElementById('status-texto');
    const textoConexion = document.getElementById('texto-conexion');
    const sliderVolumen = document.getElementById('slider-volumen');
    const sliderLuz = document.getElementById('slider-luz');
    const pickerColor = document.getElementById('picker-color');
    const selectAudio = document.getElementById('select-audio');
    const checkEfecto = document.getElementById('check-efecto');
    const checkApagado = document.getElementById('check-apagado');
    const btnListo = document.querySelector('.btn-listo');

    function actualizarEstadoConexion(conectado) {
        if (conectado) {
            statusTexto.className = "conectado";
            textoConexion.textContent = "Conectado";
        } else {
            statusTexto.className = "desconectado";
            textoConexion.textContent = "Desconectado";
        }
    }

    function verificarConexionESP32() {
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 3000);

        fetch(`${ESP32_IP}/get`, { signal: controller.signal })
            .then(response => {
                clearTimeout(timeoutId);
                actualizarEstadoConexion(response.ok);
            })
            .catch(() => {
                clearTimeout(timeoutId);
                actualizarEstadoConexion(false);
            });
    }

    function enviarComandoESP32(urlParams) {
        fetch(`${ESP32_IP}/set?${urlParams}`, { mode: 'no-cors' })
            .then(() => actualizarEstadoConexion(true))
            .catch(() => actualizarEstadoConexion(false));
    }

    // Cambio de audio en tiempo real
    if (selectAudio) {
        selectAudio.addEventListener('change', (e) => {
            enviarComandoESP32(`audio=${e.target.value}`);
        });
    }

    // Cambio de color en tiempo real
    if (pickerColor) {
        pickerColor.addEventListener('change', (e) => {
            const hex = e.target.value;
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);

            enviarComandoESP32(`tema=3&r=${r}&g=${g}&b=${b}`);
        });
    }

    // Guardar cambios
    if (btnListo) {
        btnListo.addEventListener('click', () => {
            localStorage.setItem('memot_volumen', sliderVolumen.value);
            localStorage.setItem('memot_luz', sliderLuz.value);
            localStorage.setItem('memot_color', pickerColor.value);
            if (selectAudio) localStorage.setItem('memot_audio', selectAudio.value);
            localStorage.setItem('memot_efecto', checkEfecto.checked);
            localStorage.setItem('memot_apagado', checkApagado.checked);

            const hex = pickerColor.value;
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);

            let params = `tema=3&r=${r}&g=${g}&b=${b}&volumen=${sliderVolumen.value}`;
            if (selectAudio) params += `&audio=${selectAudio.value}`;

            enviarComandoESP32(params);

            alert('¡Configuración guardada! 🌙');
        });
    }

    // Cargar historial
    function cargarConfiguracionLocal() {
        if (localStorage.getItem('memot_volumen')) sliderVolumen.value = localStorage.getItem('memot_volumen');
        if (localStorage.getItem('memot_luz')) sliderLuz.value = localStorage.getItem('memot_luz');
        if (localStorage.getItem('memot_color')) pickerColor.value = localStorage.getItem('memot_color');
        if (selectAudio && localStorage.getItem('memot_audio')) selectAudio.value = localStorage.getItem('memot_audio');
        if (localStorage.getItem('memot_efecto')) checkEfecto.checked = localStorage.getItem('memot_efecto') === 'true';
        if (localStorage.getItem('memot_apagado')) checkApagado.checked = localStorage.getItem('memot_apagado') === 'true';
    }

    cargarConfiguracionLocal();
    verificarConexionESP32();
    setInterval(verificarConexionESP32, 5000);
});