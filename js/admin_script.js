const userBtn =document.querySelector('#user-btn');
userBtn.addEventListener('click',function(){
    const userBtn =document.querySelector('.profile-detail');
    userBtn.classList.toggle('active');
})
const toggle =document.querySelector('.toggle-btn');
toggle.addEventListener('click',function(){
    const sidebar =document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
    
})