function pingpong(){
    p = document.getElementById("search").value;
    z = document.getElementById("pongping");
    if (p == "pingpong"){
        z = document.getElementById("pongping");
        if (z.className === "ping"){
            z.className += "pong";
        } else {
            z.className = "ping";
        }
    } else {
        z.className = "ping";
    }
}