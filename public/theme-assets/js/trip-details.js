// trip nav
// trip nav
document.addEventListener("DOMContentLoaded", () => {
    const nav = document.getElementById("secondaryNav");
    const navLinks = nav ? nav.querySelectorAll("a") : [];
    const select = document.getElementById("tripSelect");

    const sections = Array.from(navLinks).map(link =>
        document.querySelector(link.getAttribute("href"))
    );

    // Smooth scroll (sidebar links)
    navLinks.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute("href"));
            if (!target) return;
            window.scrollTo({
                top: target.offsetTop - 120,
                behavior: "smooth"
            });
        });
    });

    // Mobile select change
    if (select) {
        select.addEventListener("change", e => {
            const target = document.querySelector(e.target.value);
            if (!target) return;
            window.scrollTo({
                top: target.offsetTop - 120,
                behavior: "smooth"
            });
        });
    }

    const onScroll = () => {
        const scrollY = window.scrollY;
        let currentPos = scrollY + 140;

        sections.forEach((section, index) => {
            if (
                section &&
                section.offsetTop <= currentPos &&
                section.offsetTop + section.offsetHeight > currentPos
            ) {
                // Sidebar active state
                navLinks.forEach(l => l.classList.remove("active"));
                navLinks[index]?.classList.add("active");

                // Sync mobile select
                if (select) {
                    select.value = navLinks[index].getAttribute("href");
                }
            }
        });
    };

    window.addEventListener("scroll", onScroll);
    onScroll();
});

 
// 
document.addEventListener("DOMContentLoaded", () => {
    // Loop through all accordion wrappers
    document.querySelectorAll(".accordion-wrapper").forEach(wrapper => {
        const toggleBtn = wrapper.querySelector(".toggle-accordion");
        const accordions = wrapper.querySelectorAll("[data-accordion-target]");
        let expanded = false;

        toggleBtn.addEventListener("click", () => {
            accordions.forEach(button => {
                const targetId = button.getAttribute("data-accordion-target");
                const content = wrapper.querySelector(targetId);
                const icon = button.querySelector("[data-accordion-icon]");

                if (!expanded) {
                    // Expand
                    content.classList.remove("hidden");
                    button.setAttribute("aria-expanded", "true");
                    icon.classList.add("rotate-180");
                } else {
                    // Collapse
                    content.classList.add("hidden");
                    button.setAttribute("aria-expanded", "false");
                    icon.classList.remove("rotate-180");
                }
            });

            expanded = !expanded;
            toggleBtn.textContent = expanded ? "Collapse All" : "Expand All";
        });
    });
});