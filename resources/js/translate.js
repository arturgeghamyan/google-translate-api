import axios from 'axios';

document.addEventListener('DOMContentLoaded', function(){
    let errors_list = document.getElementById('errors')
    let element = document.getElementById('translate');
    element.addEventListener('click', (event) => {
        var text = document.getElementById('text').value
        var from = document.getElementById('from').value
        var to = document.getElementById('to').value
        var errors = []
        while (errors_list.firstChild) {
            errors_list.removeChild(errors_list.firstChild);
        }

        if (text == '') {
            errors.push(' lracreq text ')
        } 
        if (from == 0 || to == 0) {
            errors.push(' yntreq lezu ')
        }
        if (!errors.length) {
            axios.post('/', {
                text: text,
                from: from,
                to: to
            })
            .then((response) => {
                let from = document.getElementById('from')
                let data = response.data
                let e = document.getElementById('translated')
                e.innerHTML = data.translated_text
                from.value = data.current_lang
            }, (error) => {
//
            });
        } else {
            errors.forEach(error => {
                errors_list.innerHTML += "<p>" + error + "</p>"
            });
        }
    });
})