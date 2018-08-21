"use strict"; 

console.log("runs");

jQuery(document).ready(function(){
    console.log(jQuery)
    jQuery("#backplate").fadeTo(4000, 1.0, function(){
        console.log("ues");
         
});

    let theCard = document.querySelector(".row").children[0].children[0];
    let theCard2 = document.querySelector(".row").children[1].children[0];
    let theCard3 = document.querySelector(".row").children[2].children[0];
    let jQCard = jQuery(".blurb")[0];//targets the pharagraph in the blurb to keep position on cards resize. prevents viewport from having more height than page when a card has grown to take up 95% of the page. 
    let jQCard2 = jQuery(".blurb")[1];
    let jQCard3 = jQuery(".blurb")[2];

    let block = function(frst, scnd, thrd){
        jQuery(frst).css("display", "block")
        jQuery(scnd).css("display", "block")
        jQuery(thrd).css("display", "block")
    }


    document.getElementById("wrapper").addEventListener("click", function(event, callback){
            event.stopPropagation();    
        
        console.log("e.target.parentElement.style.width");
            theCard.parentElement.style.width = "33%"; 
            theCard.parentElement.style.opacity = "1"; 
            theCard.parentElement.style.height = "auto"; 
            theCard.children[0].style.width = "55%";
    
            theCard2.parentElement.style.width = "33%"; 
            theCard2.parentElement.style.opacity = "1"; 
            theCard2.parentElement.style.height = "auto"; 
            theCard2.children[0].style.width = "55%";
            
            theCard3.parentElement.style.width = "33%"; 
            theCard3.parentElement.style.opacity = "1"; 
            theCard3.parentElement.style.height = "auto"; 
            theCard3.children[0].style.width = "55%";

            setTimeout(function(){block(jQCard, jQCard2, jQCard3)}, 4000);
        
        });

    let none = function(frst, scnd){
        console.log(jQuery(frst));
        jQuery(frst).css("display", "none");
        jQuery(scnd).css("display", "none");
    }

    theCard.addEventListener("click", function(e, callback){
        e.stopPropagation();
        
        console.log(theCard.parentElement);
        theCard2.parentElement.style.width  = "0%"; 
        theCard3.parentElement.style.width  = "0%"; 
        theCard2.parentElement.style.opacity  = "0"; 
        theCard3.parentElement.style.opacity  = "0"; 
        theCard2.parentElement.style.height  = "0px"; 
        theCard3.parentElement.style.height  = "0px"; 

        theCard.parentElement.style.width = "95%"; 
        theCard.children[0].style.width = "25%";
    
        setTimeout(function(){none(jQCard2, jQCard3)}, 3000);
    });

    theCard2.addEventListener("click", function(e, callback){
        e.stopPropagation();
        
        console.log(theCard.parentElement);
        theCard.parentElement.style.width  = "0%"; 
        theCard3.parentElement.style.width  = "0%"; 
        theCard.parentElement.style.opacity  = "0"; 
        theCard3.parentElement.style.opacity  = "0"; 
        theCard.parentElement.style.height  = "0px"; 
        theCard3.parentElement.style.height  = "0px"; 

        theCard2.parentElement.style.width = "95%"; 
        theCard2.children[0].style.width = "25%";
    
        setTimeout(function(){none(jQCard, jQCard3)}, 3000);
        
    });

    theCard3.addEventListener("click", function(e, callback){
        e.stopPropagation();
        
        console.log(theCard.parentElement);
        theCard2.parentElement.style.width  = "0%"; 
        theCard.parentElement.style.width  = "0%"; 
        theCard2.parentElement.style.opacity  = "0"; 
        theCard.parentElement.style.opacity  = "0"; 
        theCard2.parentElement.style.height  = "0px"; 
        theCard.parentElement.style.height  = "0px"; 
        
        theCard3.parentElement.style.width = "95%"; 
        theCard3.children[0].style.width = "25%";

        setTimeout(function(){none(jQCard2, jQCard)}, 3000);
        
    });
   
});
