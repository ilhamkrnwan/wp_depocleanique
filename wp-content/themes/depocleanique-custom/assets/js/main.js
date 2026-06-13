/**
 * Depocleanique Custom — main.js
 * Interaksi UI: mobile menu, scroll-to-top, sticky header, FAQ accordion.
 */

document.addEventListener("DOMContentLoaded", function () {
  /* ─── Mobile Menu ─────────────────────────────────── */
  const siteHeader = document.getElementById("site-header");
  const menuToggle = document.getElementById("mobile-menu-toggle");
  const mobileMenu = document.getElementById("mobile-menu");
  const iconHamburger = document.getElementById("icon-hamburger");
  const iconClose = document.getElementById("icon-close");

  function isMenuOpen() {
    return !!siteHeader && siteHeader.classList.contains("is-menu-open");
  }

  function openMobileMenu() {
    if (!menuToggle || !mobileMenu || !siteHeader) {
      return;
    }

    siteHeader.classList.add("is-menu-open");
    document.body.classList.add("menu-open"); // scroll lock
    menuToggle.setAttribute("aria-expanded", "true");
    mobileMenu.setAttribute("aria-hidden", "false");

    if (iconHamburger) {
      iconHamburger.classList.add("hidden");
    }
    if (iconClose) {
      iconClose.classList.remove("hidden");
    }
  }

  function closeMobileMenu() {
    if (!menuToggle || !mobileMenu || !siteHeader) {
      return;
    }

    siteHeader.classList.remove("is-menu-open");
    document.body.classList.remove("menu-open"); // restore scroll
    menuToggle.setAttribute("aria-expanded", "false");
    mobileMenu.setAttribute("aria-hidden", "true");

    if (iconHamburger) {
      iconHamburger.classList.remove("hidden");
    }
    if (iconClose) {
      iconClose.classList.add("hidden");
    }
  }

  if (menuToggle && mobileMenu && siteHeader) {
    // Hamburger: toggle buka/tutup
    menuToggle.addEventListener("click", function (event) {
      event.stopPropagation();
      isMenuOpen() ? closeMobileMenu() : openMobileMenu();
    });

    // Tombol close (X) & backdrop — semua elemen [data-mobile-menu-close]
    document
      .querySelectorAll("[data-mobile-menu-close]")
      .forEach(function (el) {
        el.addEventListener("click", function (event) {
          event.preventDefault();
          closeMobileMenu();
        });
      });

    // Tutup menu saat link menu diklik
    mobileMenu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeMobileMenu);
    });

    // Escape menutup menu
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && isMenuOpen()) {
        closeMobileMenu();
      }
    });

    // Tutup bila viewport melebar ke desktop (≥1024px)
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 1024 && isMenuOpen()) {
        closeMobileMenu();
      }
    });
  }

  /* ─── Sticky Header Shadow ────────────────────────── */
  if (siteHeader) {
    window.addEventListener(
      "scroll",
      function () {
        if (window.scrollY > 10) {
          siteHeader.classList.add("scrolled");
        } else {
          siteHeader.classList.remove("scrolled");
        }
      },
      { passive: true },
    );
  }

  /* ─── Scroll to Top ───────────────────────────────── */
  const scrollTopBtn = document.getElementById("scroll-top");

  if (scrollTopBtn) {
    window.addEventListener(
      "scroll",
      function () {
        if (window.scrollY > 350) {
          scrollTopBtn.classList.add("is-visible");
        } else {
          scrollTopBtn.classList.remove("is-visible");
        }
      },
      { passive: true },
    );

    scrollTopBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ─── FAQ Accordion ───────────────────────────────── */
  const faqItems = document.querySelectorAll(".dc-faq-item");

  function setFaqOpen(item, shouldOpen) {
    const trigger = item.querySelector(".dc-faq-trigger");
    const panel = item.querySelector(".dc-faq-panel");
    const icon = item.querySelector(".dc-faq-icon");

    if (!trigger || !panel || !icon) {
      return;
    }

    panel.classList.toggle("is-open", shouldOpen);
    icon.classList.toggle("is-open", shouldOpen);
    trigger.setAttribute("aria-expanded", shouldOpen ? "true" : "false");
    panel.setAttribute("aria-hidden", shouldOpen ? "false" : "true");
  }

  faqItems.forEach(function (item) {
    const trigger = item.querySelector(".dc-faq-trigger");

    if (!trigger) {
      return;
    }

    trigger.addEventListener("click", function () {
      const isOpen = trigger.getAttribute("aria-expanded") === "true";

      faqItems.forEach(function (otherItem) {
        setFaqOpen(otherItem, false);
      });

      setFaqOpen(item, !isOpen);
    });
  });

  /* ─── Smooth scroll untuk anchor link ────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener("click", function (e) {
      const targetId = anchor.getAttribute("href").slice(1);
      const target = document.getElementById(targetId);
      if (target) {
        e.preventDefault();
        const headerH = siteHeader ? siteHeader.offsetHeight : 64;
        const top =
          target.getBoundingClientRect().top + window.scrollY - headerH - 8;
        window.scrollTo({ top: top, behavior: "smooth" });
        closeMobileMenu();
      }
    });
  });
});
