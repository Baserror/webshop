function flyerBerechnung() {

    var papgroße = document.getElementById("flyerGroße").value;
    var papstark = document.getElementById("papstarkFlyer").value;
    var glanz = document.getElementById("glanzFlyer").value;
    var anzahl = document.getElementById("flyerAnzahl").value;
    var faktor = 0.85;
    var basis=45;

switch (papgroße){
    case "A4":
        papgroße=0.9;
        break;
    case "A7":
        papgroße=1;
        break;
    case "DINlang":
        papgroße=1.1;
        break;

}

    switch (papstark){

        case "70g":
            papstark=0.98;
            break;
        case "90g":
            papstark=0.96;
            break;
        case "100g":
            papstark=0.95;
            break;
        case "135g":
            papstark=0.94;
            break;
        case "170g":
            papstark=0.93;
            break;
        case "250g":
            papstark=0.92;
            break;
        case "300g":
            papstark=0.90;
            break;

    }

    if (glanz=="glänzend"){
        glanz=1.05;
    }else{
        glanz=1;
    }

    var gesamtpreis= basis + (papstark*anzahl*faktor*glanz*papgroße);
    gesamtpreis= (100*(Math.round(gesamtpreis)))/100;
    document.getElementById("preis").innerHTML = "Preis: " + gesamtpreis + "€";
    document.getElementById("preisGet").value = gesamtpreis + "€";

}


function faltBerechnung() {

    var papgroße = document.getElementById("faltGroße").value;
    var papstark = document.getElementById("papstarkFalt").value;
    var glanz = document.getElementById("glanzFalt").value;
    var anzahl = document.getElementById("faltAnzahl").value;
    var faktor = 0.85;
    var basis=45;

    switch (papgroße){
        case "A4":
            papgroße=1;
            break;
        case "A7":
            papgroße=0.9;
            break;
        case "DINlang":
            papgroße=1.1;
            break;
        case "A2":
            papgroße=1.3;
            break;
        case "A3":
            papgroße=1.2;
            break;

    }

    switch (papstark){

        case "70g":
            papstark=0.98;
            break;
        case "90g":
            papstark=0.96;
            break;
        case "100g":
            papstark=0.95;
            break;
        case "135g":
            papstark=0.94;
            break;
        case "170g":
            papstark=0.93;
            break;
        case "250g":
            papstark=0.92;
            break;
        case "300g":
            papstark=0.90;
            break;

    }

  switch (glanz){
      case "glänzend":
          glanz=1;
          break;

      case "matt":
          glanz=1.1;
          break;

      case "gold":
          glanz=1.2;
          break;

      case "Recyclingpapier":
          glanz=1.05;
          break;
  }

    var gesamtpreis= basis + (papstark*anzahl*faktor*glanz*papgroße);
    gesamtpreis= (100*(Math.round(gesamtpreis)))/100;
    document.getElementById("faltPreis").innerHTML = "Preis: " + gesamtpreis + "€";
    document.getElementById("faltPreisGet").value = gesamtpreis + "€";

}

function posterBerechnung() {

    var papgroße = document.getElementById("posterGroße").value;
    var papstark = document.getElementById("papstarkPoster").value;
    var glanz = document.getElementById("glanzPoster").value;
    var anzahl = document.getElementById("posterAnzahl").value;
    var faktor = 0.85;
    var basis=45;

    switch (papgroße){
        case "A4":
            papgroße=1;
            break;
        case "A7":
            papgroße=0.9;
            break;
        case "DINlang":
            papgroße=1.1;
            break;
        case "A2":
            papgroße=1.3;
            break;
        case "A3":
            papgroße=1.2;
            break;

    }

    switch (papstark){

        case "70g":
            papstark=0.98;
            break;
        case "90g":
            papstark=0.96;
            break;
        case "100g":
            papstark=0.95;
            break;
        case "135g":
            papstark=0.94;
            break;
        case "170g":
            papstark=0.93;
            break;
        case "250g":
            papstark=0.92;
            break;
        case "300g":
            papstark=0.90;
            break;

    }

    switch (glanz){
        case "glänzend":
            glanz=1;
            break;

        case "matt":
            glanz=1.1;
            break;

        case "gold":
            glanz=1.2;
            break;

        case "Recyclingpapier":
            glanz=1.05;
            break;
    }

    var gesamtpreis= basis + (papstark*anzahl*faktor*glanz*papgroße);
    gesamtpreis= (100*(Math.round(gesamtpreis)))/100;
    document.getElementById("posterPreis").innerHTML = "Preis: " + gesamtpreis + "€";
    document.getElementById("posterPreisGet").value = gesamtpreis + "€";

}

