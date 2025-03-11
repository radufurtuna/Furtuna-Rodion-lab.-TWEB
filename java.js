
document.addEventListener("DOMContentLoaded", function () {

    const searchButton = document.getElementById("searchButton");
    const searchInput = document.getElementById("searchBar");

   
    searchButton.addEventListener("click", filterContent);
    searchInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            filterContent();
        }
    });

    function filterContent() {
        const query = searchInput.value.trim().toLowerCase();
        const sections = document.querySelectorAll(".photo-frame, .microcontroller");

        sections.forEach(section => {
            const textContent = section.textContent.toLowerCase();
            if (textContent.includes(query)) {
                section.style.display = "block"; 
            } else {
                section.style.display = "none"; 
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll('.photo-frame');

    // Functie de verificare daca secțiunea este vizibilă
    function checkVisibility() {
        const viewportHeight = window.innerHeight;
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top >= 0 && rect.top <= viewportHeight) {
                section.classList.add('visible'); // Adăugăm clasa 'visible' când secțiunea devine vizibilă
            }
        });
    }

    // Verificăm vizibilitatea la încărcarea paginii și la fiecare scroll
    checkVisibility();
    window.addEventListener('scroll', checkVisibility);
});
