exp = '';
output = document.getElementById("output");
function calc() {
    document.getElementById("error").innerHTML = "";
    try {
        currentValue = event.target.value;

        if(currentValue == 'A') {
            exp = '';
            output.value = '';
            return ;
        }

        if(currentValue == '=') {
            output.value = eval(output.value);
            exp = eval(output.value);
        }

        else if(currentValue != '=') {
            exp += currentValue;
            output.value = exp;
        }
    }
    catch(err) {
        console.log(err)
        document.getElementById("error").innerHTML = err.message;
    }

}