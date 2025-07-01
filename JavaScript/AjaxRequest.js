var HTTPRequest = new XMLHttpRequest(); //creazione oggetto XMLHttpRequest
//funzione di callback chiamata ogno volta che cambia lo stato della richiesta (readyState)
HTTPRequest.onreadystatechange = function(){
    if(HTTPRequest.readyState == 4){ //4 -> richiesta completata, 200 -> risposta server: OK
        //gestione di tutti gli errori
        switch(HTTPRequest.status){
            case 200:
                alert(HTTPRequest.responseText); //risposta testuale dal server
            case 404:
                alert("la pagina indicata non esiste!");
                break;
            case 500:
                alert("Si è verificato un errore nel server!");
                break;
            default:
                alert("Non è possibile elaborare la richiesta (" + HTTPRequest.statusText /*testo associato al codice di stato HTTP*/ + ")");
        }
    }
};
//preparazione della richiesta
HTTPRequest.open("GET", "/index.php", true); //get -> richiesta HTTP, /index.php -> url risorsa richiesta, true -> richiesta asincrona
//invio richiesta
HTTPRequest.send();

//gestione risposta ricevuta dal server, per eventuali errori