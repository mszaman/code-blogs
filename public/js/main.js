$("document").ready(function () {
    // Signout event functionality
    $("#signoutBtn").click(function (event) {
        event.preventDefault();
        $("#signoutForm").trigger("submit");
    });
});
