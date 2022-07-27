export function toastShow(toastComponent, errorMessage = "Erro", color = "#F43", outlined = false, timeout = 5000) {
    toastComponent.show({
        color,
        message: errorMessage,
        timeout,
        outlined
    });
}