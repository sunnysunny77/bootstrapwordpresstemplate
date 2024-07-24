import { events } from "./utillites.js";

export const form = () =>{

    const form = document.querySelector("#submit_form");

    events(form, "submit", (event)=> {
        event.preventDefault();
        console.log(event.target.name.value);
    });
};