


let img = new Image();
let fileName = "";

$('#div2').hide();

$('.upload-file').change(function(){
    $('#div2').show();

    var i=$('#countt').val();

    $('#upload-first').hide();
    var file = $(this)[0].files[0];
    var reader = new FileReader();
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

                $("#div2").append('<div class="col-md-4 text-center mt-2 mb-2 remove_r_'+i+'" >'
                    +'<img class="canvas" src="'+img.src+'" width="240px" height="250px" id="canva_'+i+'">'
                     +'<div class="row"><div class="col-md-6"></div>'
                    +'<div class="col-md-6"><button class"mybtn mt-3" onclick="remove_canvaa('+i+')">Remove</button></div></div>'
                    +'<input type="hidden" name="imgs[]" val="'+img.src+'"></div>'
                );
                // $("#canva_"+i+"").attr('src',img.src);
                $('#countt').val(i+1);

            };
        },
        false
    );
});


function remove_canvaa(id){

    $('.remove_r_'+id+'').remove();




};





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












