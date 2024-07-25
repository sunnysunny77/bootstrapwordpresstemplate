<form id="contact_form">
    <fieldset>
        <legend>
            <h2>Contact us</h2>
        </legend>
        <label for="name">Enter your name:
            <input type="text" name="name" id="name" autocomplete="on" required>
        </label>
        <label for="email">Enter your email:
            <input type="email" name="email" id="email" autocomplete="on" required>
        </label>
        <label for="message">Enter your message:
            <textarea name="message" id="message" maxlength="1000" rows="6" required></textarea>
        </label>
        <input type="submit" value="Send">
    </fieldset>
</form>