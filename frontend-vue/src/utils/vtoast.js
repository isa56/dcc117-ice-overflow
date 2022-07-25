export function toastShow(toastComponent, errorMessage = "Erro", color = "danger", timeout = 5000) {
    toastComponent.show({
        color,
        message: errorMessage,
        timeout,
    });
}