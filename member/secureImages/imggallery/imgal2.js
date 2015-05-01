// JavaScript Document

function hoverize(Field,Bgcol) {
	// unused
 document.getElementById(Field).style.background = Bgcol;
}

function comment_show(Add, Switch) {
 var Named = "comments";
 if (document.getElementById('addcomment').innerText == Add) { 
  for (var n=0; n < document.getElementsByName(Named).length; n++) {
   document.getElementsByName(Named)[n].style.display = 'none';
  }
  document.getElementById('comment').style.display = 'block';
  document.getElementById('comment_optional').style.display = 'block';
  document.getElementById('addcomment').innerText = Switch;   
 } else {
  for (var n=0; n < document.getElementsByName(Named).length; n++) {
   document.getElementsByName(Named)[n].style.display = 'block';
  }
  document.getElementById('comment').style.display = 'none';
  document.getElementById('comment_optional').style.display = 'none';
  document.getElementById('addcomment').innerText = Add;   
 }
}

function comment_focus(Field,Standard) {
 if (document.getElementById(Field).value == Standard) {
  document.getElementById(Field).value = '';
 }
 document.getElementById(Field).style.color = 'black';
 document.getElementById(Field).style.background = '#D9D9D9';
}

function comment_focusout(Field,Standard) {
 if (document.getElementById(Field).value == '') {
  document.getElementById(Field).value = Standard;
  document.getElementById(Field).style.background = '#E5E5E5';
 } else {
  document.getElementById(Field).style.background = 'white';
  document.getElementById(Field).style.color = '#A5A5A5';
 }
}

function lang_show(Template) {
 var Named = "comments";
 if (document.getElementById('languages').style.display == 'none') { 
  document.getElementById('languages').style.display = 'inline';
  document.getElementById('exp_lang').src = 'templates/' + Template + '/minus.jpg';
 } else {
  document.getElementById('languages').style.display = 'none'; 
  document.getElementById('exp_lang').src = 'templates/' + Template + '/plus.jpg';
 }
}