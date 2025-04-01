$(document).ready(function() {
    $("#registerForm").submit(function(event) {
        event.preventDefault();

        var username = $("#username").val().trim();
        var password = $("#password").val().trim();
        var confirm_password = $("#confirm_password").val().trim();

        if (username === "" || password === "" || confirm_password === "") {
            $(".error").remove();
            $("#registerForm").before('<p class="error">Completați toate câmpurile!</p>');
            return;
        }

        if (password !== confirm_password) {
            $(".error").remove();
            $("#registerForm").before('<p class="error">Parolele nu se potrivesc!</p>');
            return;
        }

        $.ajax({
            url: "register.php",
            type: "POST",
            data: { username: username, password: password, confirm_password: confirm_password },
            dataType: "json",
            success: function(response) {
                console.log(response); // Debugging: Verifică răspunsul în consolă
                
                if (response.success) {
                    window.location.href = "index.php"; // Redirecționează utilizatorul
                } else {
                    $(".error").remove();
                    $("#registerForm").before('<p class="error">' + response.message + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.log("Eroare AJAX:", status, error);
                alert("Eroare la trimiterea datelor. Încearcă din nou!");
            }
        });
    });
});
