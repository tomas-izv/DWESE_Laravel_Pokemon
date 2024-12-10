(function () {

    let tablaPokemon = document.getElementById('tablaPokemon');

    if(tablaPokemon) {
        tablaPokemon.addEventListener('click', clickTable);
    }

    function clickTable(event) {
        const formDelete = document.getElementById('formDelete');
        let target = event.target;
        if(target.tagName === 'A' && target.getAttribute('class') === 'borrar') {
            event.preventDefault();
            if(confirm('Confirm delete?')) {
                let url = target.dataset.href;
                formDelete.action = url;
                formDelete.submit();
            }
        }
    }

})();