function A() {
    var currentFontSize =  parseInt(document.getElementById('txt1').style.fontSize);
    $("txt1").style.fontSize = (currentFontSize + 2).toString() + ("pt");
}
function D() {
    setInterval(() => {
        A();
    }, 500);
}
var b = 0;
function B() {
    b++;
    if(b % 2 == 0){
        $("txt1").style.fontWeight = "normal";
        $("txt1").style.color = "black";
        $("txt1").style.textDecoration = "none";
        $("PMT").style.background = "none";
    }
    else{
        $("txt1").style.fontWeight = "bold";
        $("txt1").style.color = "green";
        $("txt1").style.textDecoration = "underline";
        $("PMT").style.background = "URL('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
    }
}
function C() {
    $("txt1").style.textTransform = "uppercase";
    var suffix = "-izzle.";
    var txtArray = $("txt1").value.split('.');
    $('txt1').value = txtArray.join(suffix);
}
function E() {
    var txtArray = $("txt1").value.split(' ');
    for (var i = 0; i < txtArray.length; i++){
        for (var j = 0; j < txtArray[i].length; j++){
            if (txtArray[i][j] == 'a' ||
                txtArray[i][j] == 'e' ||
                txtArray[i][j] == 'i' ||
                txtArray[i][j] == 'o' ||
                txtArray[i][j] == 'u') {
                txtArray[i] += "ay";
            }
            else {
                var tmp = txtArray[i][0];
                for(var k = 1; k < txtArray[i].length; k++){
                    txtArray[i][k-1] = txtArray[i][k];
                }
                txtArray[i][0] = "Q";
                document.write(txtArray[i]);
            }
        }
    }
    $('txt1').value = txtArray.join();
}