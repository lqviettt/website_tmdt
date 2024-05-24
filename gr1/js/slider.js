
const imgPosition = document.querySelectorAll(".slide_container img")
const imgContainer = document.querySelector(".slide_container")
const dotItem = document.querySelectorAll(".dot")
let imgNumber = imgPosition.length
let index = 0
imgPosition.forEach(function(image, index){
    image.style.left = index*100 + "%"
    dotItem[index].addEventListener("click", function(){
        slider(index)
    })
})
function imgSlide(){
    index++;
    if(index >= imgNumber){index = 0}
    slider(index)
}

function slider(index){
    imgContainer.style.left = "-" +index*100+ "%"
    const dotActive = document.querySelector(".active")
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
}
setInterval(imgSlide,5000)

/*Slider sp*/
const boxSp = document.querySelectorAll(".slider-product-bodyyy-filtering .productt-p10")
const sp = document.querySelector(".slider-product-bodyyy-filtering")
let boxNumber = boxSp.length
let start = 0;
boxSp.forEach(function(box, start){
    box.style.left = start*80 + "%"
})

function boxSlide(){
    start++;
    if(start >= boxSp.length){start = 0}
    sp.style.left = "-" +start+ "%"
}

console.log(boxSp)
//setInterval(boxSlide,5000)