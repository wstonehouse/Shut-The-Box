let textbox = document.getElementById('textboxId'); // Textbox
let valid = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}:'|`~<.>/?,; \n";
let a = "Username must be 5 characters or longer\n";
let b = "Username cannot be longer than 40 characters\n";
let c = "Username cannot contain spaces\n";
let d = "Username cannot contain semicolons\n";
let e = "Username cannot contain commas\n";
let f = "Username can only use characters from the following string: abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}:'|`~<.>/?\n";

window.onload = function() {
    // Retreive the username from any stored cookie
    let string = get_username(document.cookie, "username");

    // Set the textbox's value accordingly
    textbox.value = string;
};

function create_cookie(){
    // Retreive the input
    const name = document.getElementById('textboxId').value;

    // Check to see if its of desired form
    let message = '';

    if (name.length<5){
        message += a;
    }
    if (name.length>40){
        message += b;
    }
    if (name.includes(" ")){
        message += c;
    }
    if (name.includes(";")){
        message += d;
    }
    if (name.includes(",")){
        message += e;
    }
    for(let i=0; i<name.length; i++){
        let char = name[i];
        if(!valid.includes(char)){
            message += f;
            break;
        }
    }

    if(message!==''){
        alert(message);
        return;
    }

    // Create expiration time for an hour from now
    let now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);

    console.log(now.toUTCString());

    // Create cookie
    document.cookie = 
    'username=' + name + 
    '; expires=' + now.toUTCString() + 
    '; path=/';

    // Redirect to shut_the_box.php
    window.location.replace("https://www.pic.ucla.edu/~willstonehouse/final/shut_the_box.php");
}