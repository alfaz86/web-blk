document.addEventListener('DOMContentLoaded', function () {
    var names = ['content', 'vission_and_mission'];

    names.forEach(function (name) {
        var element = document.querySelector('textarea[name="' + name + '"]');

        if (element) {
            ClassicEditor
                .create(document.querySelector('textarea[name="' + name + '"]'), { height: 300 })
                .catch(error => {
                    console.error(error);
                });
        }
    });
});