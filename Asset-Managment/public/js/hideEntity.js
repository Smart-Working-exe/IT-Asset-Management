// const select = document.getElementById("deviceTyp");
// select.addEventListener("change", function() {
//     let selectedOption = this.value;
//     console.log("Test")
//     if(selectedOption >=3 && selectedOption <= 6){
//         document.getElementById("sometimesHide1").style.display = "none";
//         document.getElementById("sometimesHide2").style.display = "none";
//     }
//     else{
//         document.getElementById("sometimesHide1").style.display = "block";
//         document.getElementById("sometimesHide2").style.display = "block";
//     }
//     if(selectedOption == 6 || selectedOption == 7 ){
//         document.getElementById("DisplaySlide").style.display = "block";
//     }else{
//         document.getElementById("DisplaySlide").style.display = "none";
//     }
// });

$(document).ready(function(){
    $("#deviceTyp").change(function(){
        let selectedOption = $(this).val();
        console.log("Test")
        if(selectedOption >=3 && selectedOption <= 6){
            $("#sometimesHide1").hide();
            $("#sometimesHide2").hide();
        }
        else{
            $("#sometimesHide1").show();
            $("#sometimesHide2").show();
        }
        if(selectedOption == 6 || selectedOption == 7 ){
            $("#DisplaySlide").show();
        }else{
            $("#DisplaySlide").hide();
        }
    });
});