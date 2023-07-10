function highlight(field, error) {
    if (error) {
        field.style.border = "1px solid red";
    }
    else { field.style.border = ""; }
}

function verifyName(field) {
    if (field.value.length < 2 || field.value.length > 20) {
        highlight(field, true);
        return false;
    }
    else {
        highlight(field, false);
        return true;
    }
}

function verify(field) {

    if (field.value.length < 3) {
        highlight(field, true);
        return false;
    }
    else {
        highlight(field, false);
        return true;
    }
}

function verifyMail(field) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(field.value)) {
        highlight(field, false);
        return true;
    }
    else {
        highlight(field, true)
        return false;
    }
}

function verifyPass(field) {
    if (field.value.length < 8) {
        highlight(field, true);
        return false
    }
    else {
        highlight(field, false);
        return true;
    }
}

function verifyGender() {
    let ele = document.getElementsByName('gender');
    if (ele[0].checked || ele[1].checked) {
        return true;
    }
    else {
        alert('Please choose a gender');
        return false;
    }
}

function verifyAll(ob) {
    let nameOk = verifyName(ob.firstName);
    let lnameOk = verifyName(ob.lastName);
    let mailOk = verifyMail(ob.mail);
    let passOk = verifyPass(ob.pass);
    let genderOk = verifyGender();
    if (nameOk && lnameOk && mailOk && passOk && genderOk) {
        return true;
    }
    else {
        alert('Please make sure you enter your information correctly');
        return false;
    }
}

function verifyAll2(ob) {
    let mailOk = verifyMail(ob.mail);
    let passOk = verifyPass(ob.pass);
    if (mailOk && passOk) {
        return true;
    }
    else {
        alert('Please make sure you enter your information correctly');
        return false;
    }
}

