
document.getElementById('form-container').addEventListener('input', function() { 
    const fields = document.querySelectorAll('#userForm input, #userForm textarea');
    let allFilled = true;
    
    fields.forEach(function(field) {
        if (field.value === '') {
            allFilled = false;
        }
    });
    
    const submitBtn = document.getElementById('otpravka');
    if (allFilled) {
        submitBtn.disabled = false;
        submitBtn.style.opacity = 1;
        submitBtn.style.cursor = 'pointer';
    } else {
        submitBtn.disabled = true;
        submitBtn.style.opacity = 0.5;
        submitBtn.style.cursor = 'not-allowed';
    }
});

