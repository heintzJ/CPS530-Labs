function transformPhoneNumber(){
    const reg1 = /\(/;
    const reg2 = /\) /;
    let oldNumber = document.getElementById('pnumber').value;
    // first change replaces the "("
    let firstChange = oldNumber.replace(reg1, "");
    // this will change the ") " to "-"
    let newNumber = firstChange.replace(reg2, "-")
    // return the formatted phone number
	return newNumber;
}

function validatePhoneNumber(){
    let element = document.getElementById('pnumber');
    let correctFormat = /\(\d{3}\) \d{3}-\d{4}$/;
    if (element.value.match(correctFormat)){
        return true;
    }
    else{
        element.focus();
        return false;
    }
}

function validateName(){
    let element = document.getElementById('name');
    let correctFormat = /[A-Za-z\s]+$/; // only letters and spaces
    if (element.value.match(correctFormat)){
        return true;
    }
    else{
        element.focus();
        return false;
    }
}

function validateAddress(){
    let element = document.getElementById('address');
    let correctFormat = /[A-Za-z\s0-9]+$/; // letters, spaces, and numbers
    if (element.value.match(correctFormat)){
        return true;
    }
    else{
        element.focus();
        return false;
    }
}

function formValidator(){
    if (validateName() && validateAddress() && validatePhoneNumber()){
        displayFormResults();
        return true;
    }
    return false;
}

function displayFormResults(){
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const number = transformPhoneNumber();
    let output = `${name} <br> ${address} <br> ${number}`;
    document.getElementById('formResult').innerHTML = output;
}

function charCount(){
    let text = document.getElementById('countCharacters').value;
    let count = document.getElementById('characterCount');
    let cc = text.length;
    count.textContent = cc;
}

function countLetters(){
    var text = document.getElementById('countCharacters').value;
    var count = document.getElementById('letterCount');
    var lc = text.replace(/[^A-Za-z]/g, "").length;
    count.textContent = lc;
}

function isSecure(link){
    const secure = /^https/;
    return link.match(secure);
}

function showSecurity() {
    const links = [
        { id: 'security-yt', link: "https://www.youtube.com/", name: 'Youtube' },
        { id: 'security-cern', link: "http://info.cern.ch", name: 'CERN' }
    ];
    const secure = '🔒';
    const notSecure = '🔓';

    for (const elem of links) {
        document.getElementById(elem.name).innerHTML = elem.name;
        if (isSecure(elem.link)) {
            document.getElementById(elem.id).innerHTML = secure;
        } else {
            document.getElementById(elem.id).innerHTML = notSecure;
        }
    }
}