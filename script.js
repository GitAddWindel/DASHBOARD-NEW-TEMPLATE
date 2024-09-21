   /* 
   ===========================================
   Toggle between login and registration forms
   ===========================================
   */ 
   document.getElementById('showRegister').onclick = function() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
};

document.getElementById('showLogin').onclick = function() {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
};

   /* 
   ===========================================
     Show check icon when inputs are filled
   ===========================================
   */ 

document.querySelectorAll('input[type="email"], input[type="password"]').forEach(function(input) {
    input.addEventListener('input', function() {
        const checkIcon = this.nextElementSibling;
        if (this.value) {
            checkIcon.style.display = 'inline';
        } else {
            checkIcon.style.display = 'none';
        }
    });
});
