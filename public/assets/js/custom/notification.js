

function showToasfy(message, type)
{
    Toastify({
        text: message
        , duration: 3000
        , newWindow: true
        , close: true
        , gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: type == 'success' ? "linear-gradient(to right, #00b09b, #1dc5b1)" : "linear-gradient(to right, #D14426, #E03B2B)"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();
}
