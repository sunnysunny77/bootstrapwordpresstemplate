import AOS from "aos";
import { OverlayScrollbars } from "overlayscrollbars";

export const init = () => {

    AOS.init({
        once: true,
    });

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