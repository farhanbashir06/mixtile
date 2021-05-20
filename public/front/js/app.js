// const { removeData } = require("jquery");

const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let img = new Image();
let fileName = "";
const uploadFile = document.getElementById("upload-file");
const revertBtn = document.getElementById("revert-btn");
const cropbtn = document.getElementById("crop");


document.addEventListener("click", e => {
    if (e.target.classList.contains("filter-btn")) {
      if(e.target.classList.contains("vintage-add")){
        Caman("#canvas", img, function() {
          this.vintage().render();
        });
      } else if(e.target.classList.contains("lomo-add")) {
        Caman("#canvas", img, function() {
          this.lomo().render();
        });
      }else if(e.target.classList.contains("clarity-add")) {
        Caman("#canvas", img, function() {
          this.clarity().render();
        });
      }else if(e.target.classList.contains("sincity-add")) {
        Caman("#canvas", img, function() {
          this.sinCity().render();
        });
      }else if(e.target.classList.contains("crossprocess-add")) {
        Caman("#canvas", img, function() {
          this.crossProcess().render();
        });
      }
    }
});


uploadFile.addEventListener("change", () => {
    const file = document.getElementById("upload-file").files[0];
    const reader = new FileReader();
    if (file){
    
        fileName = file.name;

        reader.readAsDataURL(file);
      }
      reader.addEventListener(
        "load",
        () => {
            img = new Image();
            img.src = reader.result;
            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0, img.width, img.height);
                canvas.removeAttribute("data-caman-id");
            };
        },
        false
      );
    });


    revertBtn.addEventListener("click", e => {
        Caman("#canvas", img, function() {
          this.revert();
        });
      });

      cropbtn.addEventListener("click", e =>{
        const image = document.getElementById('canvas');
        const cropper = new Cropper(image, {
          aspectRatio: 1,
        
          crop(event) {
            console.log(event.detail.x);
            console.log(event.detail.y);
            console.log(event.detail.width);
            console.log(event.detail.height);
            console.log(event.detail.rotate);
            console.log(event.detail.scaleX);
            console.log(event.detail.scaleY);
          },
         });
    });
    

// const btn3 = document.getElementById("btn3") ;
// const btn6 = document.getElementById("btn6") ; 
// const btn8 = document.getElementById("btn8") ; 
// const btn12 = document.getElementById("btn12") ; 
// const btn16 = document.getElementById("btn16") ; 
// const btn20 = document.getElementById("btn20") ;
// const tile3 = document.getElementById("tile3") ;
  

// btn3.addEventListener("click", e =>{
//   document.getElementById("tile3").setAttribute("class", "display");
// })
    
    
    



    
    
   


      
