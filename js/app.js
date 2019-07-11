function on(selector, event, func) {
    $("body").on(event, selector, func);
}

function off(selector, event) {
    $("body").off(event, selector);
}