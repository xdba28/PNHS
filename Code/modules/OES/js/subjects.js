var divs = document.getElementsByTagName('figure');

for (var i =0; i < divs.length; i++){
divs[i].style.background = getRandomColor();
}
function getRandomColor() {
    var colors = ['#091b27', '#2e0e0a', '#4f3204', '#061c10', '#000000'];                
    var rand = Math.floor(Math.random()*colors.length);
    color = colors[rand];
    return color;
}

var imagesArray = [
    "img/subject-img/1.jpeg",
    "img/subject-img/2.jpeg",
    "img/subject-img/3.jpeg",
    "img/subject-img/4.jpeg",
    "img/subject-img/5.jpeg",
    "img/subject-img/6.jpeg",
    "img/subject-img/7.jpeg",
    "img/subject-img/8.jpeg",
    "img/subject-img/9.jpeg",
    "img/subject-img/10.jpeg",
    "img/subject-img/11.jpeg",
    "img/subject-img/12.jpeg",
    "img/subject-img/13.jpeg",
    "img/subject-img/14.jpeg",
    "img/subject-img/15.jpeg",
    "img/subject-img/16.jpeg",
    "img/subject-img/17.jpeg",
    "img/subject-img/18.jpeg",
    "img/subject-img/19.jpeg",
    "img/subject-img/20.jpeg",
    "img/subject-img/21.jpeg",
    "img/subject-img/22.jpeg",
    "img/subject-img/23.jpeg",
    "img/subject-img/24.jpeg",
    "img/subject-img/25.jpeg"
  ];
  
  var usedImages = {};
  var usedImagesCount = 0;
$('.snip1091 img').each(function() {
    var num = Math.floor(Math.random() * (imagesArray.length));
    $(this).attr("src", imageSelect(num));
});
        function imageSelect(num){
        if (!usedImages[num]){
            usedImages[num] = true;
            usedImagesCount++;
            if (usedImagesCount === imagesArray.length){
                usedImagesCount = 0;
                usedImages = {};
            }
            return imagesArray[num];
        }else{
            num = Math.floor(Math.random() * (imagesArray.length));
            return imageSelect(num);
        }
}