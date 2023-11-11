var root = window.location.origin;

function loginView() {
    return window.location.pathname.match(/^.*login$/)
}

function resetPasswordView() {
    return window.location.pathname.match(/^.*password\/reset$/)
}

if (loginView()) {
    var src = root + '/assets/images/logo-insun-medal.png';
    var icon = `<div class="text-center mb-3">
        <img src="${src}" id="icon" alt="logo-insun-medal" width="100">
    </div>`;

    // $(icon).insertBefore("form");
    $("footer").hide();
    $("div.text-center > a").hide();
}

if (resetPasswordView()) {
    var html = '<a href="' + root + '/admin/login' + '">back to login</a>';
    $("footer").hide();
    $("div.text-center.pt-3").html(html);
}
