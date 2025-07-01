document.getElementById("caricaBtn").addEventListener("click", function(){
    var http = new XMLHttpRequest();
    http.onreadystatechange = function(){
        if(http.readyState == 4){
            if(http.status == 200){
                document.getElementById("contenuto").innerHTML = http.responseText;
            }else{
                document.getElementById("contenuto").innerHTML = "Errore: " + http.status;
            }
        }
    }
    http.open("GET", "data.txt", true);
    http.send();
});