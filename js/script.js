function formatearMonto() {
    const inputMonto = document.getElementById("monto");
    const valor = parseFloat(inputMonto.value);

    if (!isNaN(valor)) {
        const valorFormateado = new Intl.NumberFormat("es-MX", {
            style: "currency",
            currency: "MXN",
        }).format(valor);

        document.getElementById("montoFormateado").textContent = valorFormateado;
    } else {
        document.getElementById("montoFormateado").textContent = "";
    }
}

function formatearMontoEdit() {
    const inputMonto = document.getElementById("editMonto");
    const valor = parseFloat(inputMonto.value);

    if (!isNaN(valor)) {
        const valorFormateado = new Intl.NumberFormat("es-MX", {
            style: "currency",
            currency: "MXN",
        }).format(valor);

        document.getElementById("editMontoFormateado").textContent = valorFormateado;
    } else {
        document.getElementById("editMontoFormateado").textContent = "";
    }
}

document.getElementById("pending-filter").addEventListener("change", function () {
    var mostrarSoloPendientes = this.checked;
    var filas = document.querySelectorAll("#miTabla tbody tr");

    filas.forEach(function (fila) {
        if (mostrarSoloPendientes) {
            if (fila.classList.contains("pendiente")) {
                fila.classList.remove("hidden");
            } else {
                fila.classList.add("hidden");
            }
        } else {
            fila.classList.remove("hidden");
        }
    });
});
