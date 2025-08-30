const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

      let getEstado = localStorage.getItem("estado");
      if(getEstado && getEstado ==="open"){
        sidebar.classList.toggle("close");
      }

      let getModo = localStorage.getItem("modo");
      if(getModo && getModo ==="dark"){
        body.classList.toggle("dark");
      }

      modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
          localStorage.setItem("modo", "dark");
        }else{
          localStorage.setItem("modo", "light");
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
          localStorage.setItem("estado", "close");
        }else{
          localStorage.setItem("estado", "open");
        }

      });