function like(el) {
    var id = el.getAttribute('id');
    if (el.checked) {
        var http = new XMLHttpRequest();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var response = JSON.parse(this.responseText);
                if (response.Success == 0) {
                    el.checked = false;
                    alert('You have to be logged in to like a post');
                } else {
                    var inner = document.getElementById('likes'+id);
                    var likes = parseInt(inner.innerHTML);
                    inner.innerHTML = (likes + 1) + '';
                    console.log('success');
                }
            }
        };
        http.open('GET', 'index.php?controller=gallery&action=like&type=json&id=' + el.getAttribute('id'));
        http.send();
    } else {

    }

}