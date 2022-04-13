set = document.getElementsByClassName('caché')
function loadscreen(){
if (set != "") {
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
      });
}
}
setTimeout(() => {loadscreen(); }, 2000);