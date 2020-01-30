
    var nav = document.getElementById('nav');
        window.onscroll = function() {
          if (window.pageYOffset > 100) {
            nav.classList.add("white");
            document.getElementById("botones").innerHTML = "";
          } else {
            nav.classList.remove("white");
            document.getElementById("botones").innerHTML = "";
          }
        }
