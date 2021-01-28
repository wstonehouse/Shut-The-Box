let timeoutID = null;
const filename = 'scores.txt';

window.onload = function(){

    const request = new XMLHttpRequest();

    request.onload = function() {
        if (this.status === 200) {
          const response = document.getElementById('response');
          response.innerHTML = this.responseText.split('\n').join('<br>');
        }
      };
    
    request.open('GET', filename + '?v=' + Math.random());
    request.send();

    timeoutID = setTimeout(print, 10000);
}

function print() {

    const request = new XMLHttpRequest();

    request.onload = function() {
        if (this.status === 200) {   
          const response = document.getElementById('response');
          response.innerHTML = this.responseText.split('\n').join('<br>');
        }
      };
    
    request.open('GET', filename + '?v=' + Math.random());
    request.send();

    timeoutID = setTimeout(print, 10000);
}

function stop_printing() {
  clearTimeout(timeoutID);
}

function force_print() {
  stop_printing();
  print();
}