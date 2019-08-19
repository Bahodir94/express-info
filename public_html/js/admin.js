$(function () {
    $('.link-effect').click(function () {
        if(getCookie('adminSidebarColor') == 'black')
        {
            document.cookie = 'adminSidebarColor=white; path=/;';
        }else if(getCookie('adminSidebarColor') == 'white')
        {
            document.cookie = 'adminSidebarColor=black; path=/;';
        }else{
            document.cookie = 'adminSidebarColor=black; path=/;';
        }
    });
});



function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}