
function change_background(){
    var backgrounds = ['1.png','2.png','3.png','4.jpg','5.png'];
    var random_number = Math.floor(Math.random()*5);
    var body_element = document.body.style;
    body_element.backgroundImage = 'url(backgrounds/'+ backgrounds[random_number] +')';
    body_element.backgroundSize = "cover";
    body_element.backgroundRepeat = 'no-repeat';
}
change_background();
$(document).ready(function(){
    $('#chat-container').hide();                /*By default, enter task panel is hidden */
    $('#toggle').click(function(){
        $('#chat-container').slideToggle();             /*toggle the add task panel */
    });
    $("#text-field").focus(function(){
        $("#chat-container").css("opacity",'1');
    });
});

