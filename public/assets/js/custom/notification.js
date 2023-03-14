

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
            background: "linear-gradient(to right, #00b09b, #00b09b)"
        , }
        , onClick: function() {} // Callback after click
    }).showToast();
}
