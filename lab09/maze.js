/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
    "use strict"
    // redRegion = $("boundary1");
    // redRegion.addClassName("overBoundary");
    // document.getElementById("boundary1").addEventListener("mouseover", overBoundary);
    var doc = document.getElementsByClassName("boundary");
    for (let index = 0; index < doc.length; index++) {
        const element = doc[index];
        element.addEventListener("mouseover", overBoundary);
    }
    $("end").addEventListener("mouseover", overEnd);
    $("start").addEventListener("click", startClick);
    $("maze").addEventListener("mouseout", overBody);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    // document.getElementById("boundary1").style.backgroundColor = "red";
    var doc = document.getElementsByClassName("boundary");
    for (let index = 0; index < doc.length; index++) {
        const element = doc[index];
        element.style.backgroundColor = "red";
    }
    $("status").innerHTML = "You lose! :(";
    // alert("You lose! :(")
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    var doc = document.getElementsByClassName("boundary");
    for (let index = 0; index < doc.length; index++) {
        const element = doc[index];
        element.style.backgroundColor = "white";
    }
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    $("status").innerHTML = "You win! :)";
    // alert("You win! :)")
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    var doc = document.getElementsByClassName("boundary");
    for (let index = 0; index < doc.length; index++) {
        const element = doc[index];
        element.style.backgroundColor = "red";
    }
    $("status").innerHTML = "You lose! :(";
}



