document.addEventListener('DOMContentLoaded', function() {
    let checkboxes = document.querySelectorAll('input[type=checkbox]');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('click', function () {
            let id = this.id;
            document.getElementById(`${id}-prices`).classList.toggle('uk-hidden');
        });
    });
});
