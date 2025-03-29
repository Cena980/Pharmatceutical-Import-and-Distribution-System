let currentLang = "en"; // Default language (adjust as needed)


// Search Validation
function validate(event) {
    
    if (event) event.preventDefault(); // Prevent form from reloading page

    let searchInput = document.getElementById("search");
    let searchport = document.getElementById("searchport");
    let barover = document.getElementById("barover");

    if (searchInput.value.trim().length < 1) {
        alert("Cannot search for an empty string");
        return;
    }

    const formData = new FormData(document.forms["search"]);
    const query = new URLSearchParams(formData).toString();

    fetch("php/searchdrugs.php?" + query, {
        method: "GET",
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim()) {
            searchport.innerHTML = data;
            searchport.style.display = "block";

            setTimeout(() => {
                let rows = searchport.querySelectorAll("tr").length;
                let rowHeight = 35;
                let minHeight = 180;
                let newHeight = Math.min(minHeight + rows * rowHeight);

                barover.style.height = newHeight + "px";
                searchport.style.height = (newHeight - 140) + "px";
                searchport.style.display = "block";
            }, 10);
        } else {
            searchport.style.display = "none";
            searchport.style.height = "0px";
            barover.style.height = "100px";
        }
    })
    .catch(error => console.error("Error:", error));
}

// Reset Search
function resetSearch() {
    document.getElementById("search").value = "";
    document.getElementById("searchport").innerHTML = "";
    document.getElementById("bar").style.height = "100px";
    document.getElementById("barover").style.height = "110px";
}

// Handle Enter Key for Search
document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("search").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            validate();
        }
    });

    // Highlight active navigation link
    const currentPath = window.location.pathname.split("/").pop();
    document.querySelectorAll(".button a").forEach(link => {
        const linkPath = new URL(link.href, window.location.origin).pathname.split("/").pop();
        if (linkPath === currentPath) {
            link.parentElement.classList.add("active");
        }
    });

    // Apply Language Setting
    setLanguage(currentLang);
});

// Language Switching
function setLanguage(language) {
    document.cookie = "lang=" + language + "; path=/";

    document.querySelectorAll("[data-key]").forEach(el => {
        const key = el.getAttribute("data-key");
        el.textContent = translations[language][key] || el.textContent;
        if (el.placeholder) {
            el.placeholder = translations[language][key] || el.placeholder;
        }
    });

    const newUrl = new URL(window.location);
    newUrl.searchParams.set("lang", language);
    window.history.replaceState(null, "", newUrl);
}
