var color_picker_wrapper

function editPixelPage() {
    var color_picker = document.getElementById("post_color");
    color_picker_wrapper = document.getElementById("post_color_wrapper");

    color_picker.onchange = function() {
        color_picker_wrapper.style.backgroundColor = color_picker.value;    
    }
    color_picker_wrapper.style.backgroundColor = color_picker.value;
}

function addFocus() {
    color_picker_wrapper.style.borderColor = "#39a9db";
    color_picker_wrapper.style.boxShadow = "0 0 0 0.1825rem #39a9db";
}

function loseFocus() {
    color_picker_wrapper.style.borderColor = "";
    color_picker_wrapper.style.boxShadow = "";
}