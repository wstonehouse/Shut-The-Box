let box_score = 45; // 1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9
const boxes = document.getElementsByClassName('check'); // Array of checkboxes
const nums = document.getElementsByTagName('th'); // Array of corresponding numbers
const submit_box = document.getElementById('submit_box'); // Submit button
const dice_button = document.getElementById('dice_button'); // Roll dice button
const username = get_username(document.cookie, "username"); // Get dat username babyyyyy
let sum = 0; // Roll dice total
const colors = document.getElementsByClassName('box'); // Array of corresponding numbers

window.onload = function() {
    submit_box.disabled = !submit_box.disabled; // Start off with the submit box disabled
    for (let i=0; i<nums.length; i++){
        const num = nums[i];
        if (boxes[i].disabled === false){
            num.addEventListener('click', function(){
                boxes[i].checked = !boxes[i].checked;
            });
        }
    }
};

/**
Rolls two dice if score is more than 6. Rolls one if it is 6 or less.
*/
function roll_dice(){
    if(box_score>6){
        let dice_1 = 1 + Math.floor(6*Math.random()); // First random die
        let dice_2 = 1 + Math.floor(6*Math.random()); // Second random die
        sum = Number(dice_1+dice_2); // Sum of die
        let result = dice_1+' + '+dice_2+' = '+sum; // Create result as a string
        const show_result = document.getElementsByTagName("span")[1]; // Get area where you want to insert text
        show_result.innerHTML = result; // Insert string into document
        dice_button.disabled = true; // Disable the roll dice button
        submit_box.disabled = false; // Enable the submit box selection
    }
    else{
        let dice_1 = 1 + Math.floor(6*Math.random());
        sum = dice_1; // save dice result into global variable
        const show_result = document.getElementsByTagName("span")[1];
        show_result.innerHTML = dice_1;
        dice_button.disabled = true; // Disable the roll dice button
        submit_box.disabled = false; // Enable the submit box selection
    }
}

/**
Adds up the checked boxes' values
@return {Number} the dice added together
 */
function sum_checked_values() {
    let total = 0;
    for(let i=0; i<boxes.length; i++){
        if (boxes[i].checked){
            total += i+1;
        }
    }
    return total;
}

/**
Check submission and make sure ever
 */
function check_submission() {
    if (sum === sum_checked_values()){
        for(let i=0; i<boxes.length; i++){
            const box = boxes[i];
            if (box.checked){
                const num = nums[i];
                num.style.backgroundColor = "coral"; /////////
                box.checked = false; // Uncheck checkbox
                box.disabled = true; // Disable checkbox
            }
        }
        box_score -= sum;
        dice_button.disabled = false; // Enable the roll dice button
        submit_box.disabled = true; // Disable the submit box section
        const old_result = document.getElementsByTagName("span")[1]; // Get area where you want to remove last results
        old_result.innerHTML = null; // Remove last results

    }
    else{
        alert('The total boxes you selected does not match the dice roll. Please make another selection and try again');
    }   
}

/**
Give final score. "POST" AJAX request will occur and send information to score.php.
score.php will use that info to write to the text file.
Finally, when they click okay redirect to a scores.php
 */
function finish() {
    alert("Your score is: "+box_score);

    // Make AJAX request and send score to score.php
    const request = new XMLHttpRequest();

    request.onload = function() {
        if (this.status === 200) {
            document.getElementbyId('response').innterHTML += this.responseText;
        }
    };

    // We will send info to score.php
    request.open('POST', 'score.php');
    // Send a header to specify format. Make a post w/o using a web form
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    // Query string
    let queryString = 'username='+username+'&box_score='+box_score;
    // Send the box_score and username
    request.send(queryString);
    // Redirect
    window.location.replace("https://www.pic.ucla.edu/~willstonehouse/final/scores.php");
}