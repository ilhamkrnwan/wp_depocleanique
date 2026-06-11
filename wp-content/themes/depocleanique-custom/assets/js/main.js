/**
 * Depocleanique Custom — main.js
 * Interaksi UI: mobile menu, scroll-to-top, sticky header, FAQ accordion.
 */

document.addEventListener("DOMContentLoaded", function () {
  /* ─── Mobile Menu ─────────────────────────────────── */
  const menuToggle = document.getElementById("mobile-menu-toggle");
  const mobileMenu = document.getElementById("mobile-menu");
  const iconHamburger = document.getElementById("icon-hamburger");
  const iconClose = document.getElementById("icon-close");

  function openMobileMenu() {
    mobileMenu.classList.remove("hidden");
    menuToggle.setAttribute("aria-expanded", "true");
    iconHamburger.classList.add("hidden");
    iconClose.classList.remove("hidden");
  }

  function closeMobileMenu() {
    mobileMenu.classList.add("hidden");
    menuToggle.setAttribute("aria-expanded", "false");
    iconHamburger.classList.remove("hidden");
    iconClose.classList.add("hidden");
  }

  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener("click", function () {
      const isOpen = !mobileMenu.classList.contains("hidden");
      isOpen ? closeMobileMenu() : openMobileMenu();
    });

    // Tutup menu saat link diklik
    mobileMenu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeMobileMenu);
    });
  }

  /* ─── Sticky Header Shadow ────────────────────────── */
  const siteHeader = document.getElementById("site-header");

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
  document.querySelectorAll(".dc-faq-trigger").forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      const item = trigger.closest(".dc-faq-item");
      const panel = item.querySelector(".dc-faq-panel");
      const icon = item.querySelector(".dc-faq-icon");
      const isOpen = icon.classList.contains("is-open");

      // Tutup semua item lain
      document.querySelectorAll(".dc-faq-item").forEach(function (otherItem) {
        otherItem.querySelector(".dc-faq-panel").classList.remove("is-open");
        otherItem.querySelector(".dc-faq-icon").classList.remove("is-open");
        otherItem
          .querySelector(".dc-faq-trigger")
          .setAttribute("aria-expanded", "false");
      });

      // Toggle item yang diklik
      if (!isOpen) {
        panel.classList.add("is-open");
        icon.classList.add("is-open");
        trigger.setAttribute("aria-expanded", "true");
      }
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
