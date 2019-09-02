window.onload=function(){

    // autoSlider ();
    // var left = 0;
    // var timer;
    // function autoSlider () {
    //     timer = setTimeout (function (){
    //         var slider_wrapper = document.querySelector('.slider .slider_wrapper');
    //         left = left - 240;
    //         if (left < -1200){
    //             left = 0;
    //             clearTimeout(timer);
    //         }
    //         slider_wrapper.style.left = left  + 'px';
    //         autoSlider();
    //     }, 5000);
    // }


    $('.slider_wrapper').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
      });




    var menuElem = document.getElementById('dropdown-menu'),
        titleElem = menuElem.querySelector('.dropdown_title');
        document.onclick = function(event) {
        var target = elem = event.target;
        while (target != this) {
                if (target == menuElem) {
                    if(elem.tagName == 'A') titleElem.innerHTML = elem.textContent;
                    menuElem.classList.toggle('open')
                        return;
                }
                target = target.parentNode;
        }
        menuElem.classList.remove('open');
    }

    
}