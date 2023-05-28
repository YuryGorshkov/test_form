$(document).ready(function() {
  $('#iform').submit(function(){
    var url = this.dataset['url'];
    console.log(url);
  	$.post(
  		url,
  		$("#iform").serialize(),
  		function(msg) {
        const parser = new DOMParser();
        const parsedDocument = parser.parseFromString(msg, "text/html")
        text = parsedDocument.getElementById('elem_mess').innerHTML;
        document.getElementById('message').style.display = "block";
  			$('#message').html(text);
  		}
  	);
  	return false;
  });
});
