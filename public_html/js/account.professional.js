document.addEventListener('DOMContentLoaded', function() {
    let checkboxes = document.querySelectorAll('.custom-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('click', function () {
            let id = this.id;
            document.getElementById(`${id}-prices`).classList.toggle('d-none');
            let input = $(checkbox).find('input[type=checkbox]');
            if (input.prop('checked') === true) {
                input.prop('checked', false);
            } else {
                input.prop('checked', true);
            }
        });
    });
});
