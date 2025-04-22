import { OverlayScrollbars } from "overlayscrollbars";

const overlay = () => {

  window.osInst = OverlayScrollbars(document.body, {
    overflow: {
      x: "hidden",
      y: "scroll",
    },
    scrollbars: {
      theme: "os-theme-body",
    },
  });
};

const scrolled = (obj, bool) => {

  obj.forEach(index => {

    const options = {
      rootMargin: bool ? `${index.offsetTop}px` : "0px",
    };

    const observer = new IntersectionObserver((entries, observer)=>{

      entries.filter(index=> index.isIntersecting).forEach(index => {

        index.target.classList.add("scrolled");
        observer.unobserve(index.target);
      });
    }, options);

    observer.observe(index);
  });
};

export const init = () => {

  scrolled(document.querySelectorAll(".scrolled-init"), false);
  overlay();
};