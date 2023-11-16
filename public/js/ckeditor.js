document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create(document.querySelector('textarea[name="content"]'), { height: 300 })
        .catch(error => {
            console.error(error);
        });
});