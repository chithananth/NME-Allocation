document.addEventListener("DOMContentLoaded", function () {
    const logoContainer = document.querySelector('.logo-container');
    const loginContainer = document.querySelector('.login-container');
  
    setTimeout(() => {
      logoContainer.style.opacity = '1';
      setTimeout(() => {
        loginContainer.style.opacity = '1';
      }, 1000); // Wait for logo animation to complete before revealing the login form
    }, 500); // Adjust the delay based on your needs
  });
  