function redirectToPage(event) {
            event.preventDefault(); // Prevent the default form submission
            const nameInput = document.getElementById('name');
            const name = nameInput.value;
            const roleSelect = document.getElementById('role');
            const selectedOption = roleSelect.value;
            const contactInput = document.getElementById('contact');
            const contact = contactInput.value;

            if (selectedOption === 'farmer') {
                window.location.href = `farmer.html?name=${name}`; // Redirect to farmer page with name parameter
            } else if (selectedOption === 'whole seller') {
                window.location.href = 'order.html'; // Redirect to whole seller page
            }
        }

        // Attach the event listener to the form submit event
        const form = document.getElementById('userForm');
        form.addEventListener('submit', redirectToPage);
