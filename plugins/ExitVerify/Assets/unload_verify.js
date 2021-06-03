function exit_confirm(clickedItem) {
    let url;
    if (clickedItem.nodeName === 'A') {
        url = clickedItem.href;
    } else {
        return;
    }
    if (window.confirm('آیا می خواهید این صفحه را ترک کنید؟')) {
        window.location.href = url;
    }
}

function getAllLinksWithExternalClass() {
    document.querySelectorAll('a').forEach(a => {
        a.classList.add(location.hostname === a.hostname || !a.hostname.length ? 'local' : 'external');
    });
    let linksArray = [];
    let links = document.querySelectorAll('a.external');
    for (let i = 0; i < links.length; i++) {
        linksArray.push(links[i]);
    }
    return linksArray;
}

function registerOnClickEvent() {
    let links = getAllLinksWithExternalClass();
    for (let i = 0; i < links.length; i++) {
        let self = links[i];
        self.addEventListener('click', function (event) {
            event.preventDefault();
            exit_confirm(this);
        }, false);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    registerOnClickEvent();
});
