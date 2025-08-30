const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

      let getStatus = localStorage.getItem("status");
      if(getStatus && getStatus ==="open"){
        sidebar.classList.toggle("close");
      }

      let getMode = localStorage.getItem("mode");
      if(getMode && getMode ==="dark"){
        body.classList.toggle("dark");
      }
     
      modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
          localStorage.setItem("mode", "dark");
        }else{
          localStorage.setItem("mode", "light");
        }

        if(body.classList.contains("dark")){
            modeText.innerText = "Modo claro"
        }else{
            modeText.innerText = "Modo oscuro"
        }
      });

      toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");

        if(sidebar.classList.contains("close")){
          localStorage.setItem("status", "close");
        }else{
          localStorage.setItem("status", "open");
        }

      });