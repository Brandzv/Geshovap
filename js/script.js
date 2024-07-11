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
