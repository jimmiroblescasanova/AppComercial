require("./bootstrap");

window.$ = window.jQuery = require("jquery");

require('admin-lte');

$('#logoutButton').on('click', function (event) {
    event.preventDefault();
    $('#logoutForm').submit();
});
