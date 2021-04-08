function messages(params) {
    if (window.confirm(params)) {
        return true;
    }
    return false;
}