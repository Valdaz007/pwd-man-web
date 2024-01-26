function viewPwd() {
    const rad = document.getElementsByTagName('input');

    Array.from(rad).forEach(i => {
        if (i.type === "checkbox") {
            var pwd = i.previousElementSibling;
            if (i.checked == true) pwd.type = "text";
            else pwd.type = "password";
        }
    });
}