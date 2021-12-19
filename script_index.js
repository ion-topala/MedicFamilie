const header = document.getElementById('header');
const toggle = document.getElementById('toggle');
const navbar = document.getElementById('navbar');

document.onclick = function (e){
    if (e.target.id !== 'header' && e.target.id !== 'toggle'&& e.target.id !== 'navbar'){
        toggle.classList.remove('active');
        navbar.classList.remove('active');
    }
}
toggle.onclick = function (){
    toggle.classList.toggle('active');
    navbar.classList.toggle('active');
}

const button = document.getElementById('button');
const close = document.querySelector('.close');


button.addEventListener('click', function (){
    document.querySelector('.bg-modal').style.display = 'flex';
});

close.addEventListener('click', function (){
   document.querySelector('.bg-modal').style.display = 'none';
});

