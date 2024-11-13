let userBtn=document.querySelector('.profile-detail');
document.querySelector('#user-btn').onclick = () =>{
    userBtn.classList.toggle('active');
    searchForm.classList.remove('active');
}  

let searchForm=document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    userBtn.classList.remove('active');
} 

let navbar =document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
} 

// home slider
const imageBox = document.querySelector('.slider-container');
const slides = document.querySelectorAll('.sliderBox');
var i = 0;

function nextSlide() {  
    slides[i].classList.remove('active');
    i =(i + 1) % slides.length;
    slides[i].classList.add('active');    
}

function prevSlide() {  
    slides[i].classList.remove('active');
    i = (i - 1 + slides.length) % slides.length;
    slides[i].classList.add('active');    
} 
// end of home slider


//starting of Testimonial 

const btn = document.getElementsByClassName('btn1');
const slide = document.getElementById('slide');

btn[0].onclick = () => {
    slide.style.transform = "translateX(0rem)";
    for (var i = 0; i < 4; i++) {

       btn[i].classList.remove("active");
    }
    btn[0].classList.add("active");
};

btn[1].onclick = () => {
    slide.style.transform = "translateX(-80rem)";
    for (var i = 0; i < 4; i++) {

        btn[i].classList.remove("active");
    }   
    btn[1].classList.add("active");
};

btn[2].onclick = () => {
    slide.style.transform = "translateX(-160rem)";
    for (var i = 0; i < 4; i++) {

        btn[i].classList.remove("active");
    }   
    btn[2].classList.add("active");
};

btn[3].onclick = () => {
    slide.style.transform = "translateX(-240rem)";
    for (var i = 0; i < 4; i++) {

        btn[i].classList.remove("active");
    }   
    btn[3].classList.add("active");
};

// end of about page Testimonial

// 
