var uploadField = document.querySelector("input.file");
uploadField.onchange = function() {
    if(this.files[0].size > 8192000){
        alert("A kép mérete túl nagy!");
        this.value = "";
    };
};