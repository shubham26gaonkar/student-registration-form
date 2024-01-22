
function validateForm(name, email, contact, gender) {
// Check if any of the fields are empty
    if (!name || !email || !contact || !gender) {
        alert('Please fill in all fields with Data.');
        return false; // Stop further execution if any field is empty
    }

    // Validate email format
    if (!/\S+@\S+\.\S+/.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    // Validate mobile number format
    if (!/^\d{10}$/.test(contact)) {
        alert('Please enter a valid 10-digit mobile number.');
        return false;
    }

    // Validate password length and special character
    /*if (password.length < 6 || !/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        alert('Password should be at least 6 characters long and contain at least one special character.');
        return false;
    }*/

    return true;
}