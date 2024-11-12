<style>
.theme-settings-swatches {
    display: flex;
    gap: 10px; /* Adds space between color options */
}

.swatch-holder {
    width: 30px;  /* Set size for the color circle */
    height: 30px;
    border-radius: 50%; /* Makes it circular */
    cursor: pointer;
    border: 2px solid #ffffff;
    display: inline-block;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Adds shadow for visibility */
}


    .text-black {
    color: black !important;
}

.text-white {
    color: white !important;
}

/* Links color for better visibility */
.app-header a, .app-sidebar a {
    color: inherit; /* Link color will follow text color */
}
</style>
<div class="ui-theme-settings">
    <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning" style="top:110px !important;">
        <i class="fa fa-cog fa-w-16 fa fa-2x"></i>
    </button>
    <div class="theme-settings__inner">
        <div class="scrollbar-container">
            <div class="theme-settings__options-wrapper">
                <h3 class="themeoptions-heading">
                    <div>
                        Header Options
                    </div>
                    <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                        Restore Default
                    </button>
                </h3>
                <div class="p-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5 class="pb-2">Choose Color Scheme
                            </h5>
                            <div class="theme-settings-swatches">

                                <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                </div>

                                <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                </div>

                                <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                </div>

                                <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3 class="themeoptions-heading">
                    <div>Sidebar Options</div>
                    <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                        Restore Default
                    </button>
                </h3>
                <div class="p-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5 class="pb-2">Choose Color Scheme
                            </h5>
                            <div class="theme-settings-swatches">
                                <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                </div>

                                <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                </div>

                                <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                </div>

                                <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
// Function to save color scheme to local storage
function saveColorScheme(type, colorClass) {
    if (type === "header") {
        localStorage.setItem("headerColorScheme", colorClass);
    } else if (type === "sidebar") {
        localStorage.setItem("sidebarColorScheme", colorClass);
    }
}

// Function to set text color based on the background color
function setTextColorBasedOnBg(element, bgClass) {
    if (bgClass === "bg-heavy-rain") {
        element.classList.add("text-black");
        element.classList.remove("text-white");
    } else {
        element.classList.add("text-white");
        element.classList.remove("text-black");
    }
}

// Function to apply saved color schemes and set text color
function applySavedColorScheme() {
    const headerColor = localStorage.getItem("headerColorScheme");
    const sidebarColor = localStorage.getItem("sidebarColorScheme");

    const headerElement = document.querySelector(".app-header");
    const sidebarElement = document.querySelector(".app-sidebar");

    if (headerColor && headerElement) {
        headerElement.className = `app-header ${headerColor}`;
        setTextColorBasedOnBg(headerElement, headerColor);
    }
    if (sidebarColor && sidebarElement) {
        sidebarElement.className = `app-sidebar ${sidebarColor}`;
        setTextColorBasedOnBg(sidebarElement, sidebarColor);
    }
}

// Event listeners for header color options
document.querySelectorAll(".switch-header-cs-class").forEach(element => {
    element.addEventListener("click", function() {
        const colorClass = this.getAttribute("data-class");
        const headerElement = document.querySelector(".app-header");
        headerElement.className = `app-header ${colorClass}`;
        setTextColorBasedOnBg(headerElement, colorClass);
        saveColorScheme("header", colorClass);
    });
});

// Event listeners for sidebar color options
document.querySelectorAll(".switch-sidebar-cs-class").forEach(element => {
    element.addEventListener("click", function() {
        const colorClass = this.getAttribute("data-class");
        const sidebarElement = document.querySelector(".app-sidebar");
        sidebarElement.className = `app-sidebar ${colorClass}`;
        setTextColorBasedOnBg(sidebarElement, colorClass);
        saveColorScheme("sidebar", colorClass);
    });
});

// Apply saved color scheme on page load
document.addEventListener("DOMContentLoaded", applySavedColorScheme);

</script>
