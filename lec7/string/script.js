var letters="abcdefghiklmnopqrstuvwxyzabcdefghikl";
function buttonPressed()
{
    var inputField=document.getElementById("inputField");
    
    document.getElementById("results").innerHTML=
        "<p>First occurrence is located at index: " + 
        letters.indexOf(inputField.value)+ "</p>"+
        "<p> Last occurrence is located at index: " + 
        letters.lastIndexOf(inputField.value) + "</p>" +
        "<p> First occurrence from index 12 is located at index: " + 
        letters.indexOf(inputField.value, 12) + "</p>" +
        "<p> Last occurrence from index 12 is located at index: " + 
        letters.lastIndexOf(inputField.value, 12) + "</p>";      
}

function start()
{
    var searchButton = document.getElementById("searchButton");
    searchButton.addEventListener("click",buttonPressed,false);
}
window.addEventListener("load", start,false);