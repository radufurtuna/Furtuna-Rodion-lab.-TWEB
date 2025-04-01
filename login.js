$(document).ready(function() {
    $("#loginForm").submit(function(event) {
        event.preventDefault(); 

        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        if (username === "" || password === "") {
            $(".error").remove();
            $("#loginForm").before('<p class="error">Completați toate câmpurile!</p>');
            return;
        }

        $.ajax({
            url: "login.php", // Fișierul care procesează datele
            type: "POST",
            data: { username: username, password: password },
            dataType: "json",
            success: function(response) {
                console.log(response); // Debugging: Verifică răspunsul în consolă
                if (response.success) {
                    window.location.href = "index.php"; // Redirecționează utilizatorul
                } else {
                    $(".error").remove(); // Elimină mesajele de eroare anterioare
                    $("#loginForm").before('<p class="error">' + response.message + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.log("Eroare AJAX:", status, error); // Debugging: Afișează eroarea
                alert("Eroare la trimiterea datelor. Încearcă din nou!");
            }
        });
    });
});