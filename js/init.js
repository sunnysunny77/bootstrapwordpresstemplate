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

const scrolled = (obj, options) => {

  const observer = new IntersectionObserver((entries, observer)=>{

    entries.filter(index=> index.isIntersecting).forEach(index => {

      index.target.classList.add("scrolled");
      observer.unobserve(index.target);
    });
  },options);

  obj.forEach(index => {

    observer.observe(index);
  });
};

export const init = () => {

  scrolled(document.querySelectorAll(".scrolled-init"), {rootMargin: "0px 0px 0px 0px"});
  overlay();
};