const accessToken = document.getElementById('accessToken').value;

localStorage.setItem('accessToken', accessToken) ;

window.location.href = "http://lecomptoiraburger/home";
