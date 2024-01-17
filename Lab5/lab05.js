$(document).ready(function() {
    $(".draggable").draggable({
        containment: "#game",
        cursor: "move",
    });

    const topOrigin = $("#fullscreen").offset().top;
    const leftOrigin = $("#fullscreen").offset().left;

    $("#fullscreen").hover(function() {
        $(this).css({
            "position": "absolute",
        });
        $(this).animate({
            top: 0,
            left: 0,
            width: "100vw",
            height: "100vh",
        }, 1000);
        $("#revert").show().click(function(){
            $("#fullscreen").animate({
                top: topOrigin,
                left: leftOrigin,
                width: "10vw",
                height: "10vh",
            }, 1000, function(){
                $("#revert").hide();
            });
        });
    });
});

function savePotato(){
    html2canvas(document.getElementById("game")).then(function(canvas) {
        let image = canvas.toDataURL("image/png");
        let link = document.createElement("a");
        link.href = image;
        link.download = "MrPotatoHead.png";
        link.click();
        canvas.remove();
    });
}