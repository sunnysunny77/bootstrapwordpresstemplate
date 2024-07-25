import { events } from "./utillites.js";


export const contact_form = () => {

    events(document.querySelector("#contact_form"), "submit", async (event) => {
        event.preventDefault();
        const data = new FormData(event.currentTarget);
        data.append( "action", "contact_form" );
        data.append( "to_email", "shlooby07@gmail.com" );
        data.append( "subject", "New Contact Us Message" );
        await fetch(frontend_ajax_object.ajax_url, {
                method: "POST",
                body: data
            }
        );
    });
};

