import * as ContentTools from "./content-tools.min.js"

export function createEditor(apiURL, setData) {
    ContentTools.StylePalette.add([
        new ContentTools.Style('Author', 'author', ['p']),
        new ContentTools.Style('Граница', 'ce-table-border', ['table', 'td', 'th']),
        new ContentTools.Style('Телефон', 'ce-phone', ['p']),
        new ContentTools.Style('E-mail', 'ce-email', ['p']),
        new ContentTools.Style('Адрес', 'ce-address', ['p']),
    ]);

    ContentTools.IMAGE_UPLOADER = saveImage;

    ContentTools.RESTRICTED_ATTRIBUTES = {};

    let editor = ContentTools.EditorApp.get();
    editor.init('*[data-editable]', 'data-name');

    editor.addEventListener('saved', function (ev) {
        let name, payload, regions, data;

        regions = ev.detail().regions;
        if (Object.keys(regions).length === 0) {
            return;
        }

        this.busy(true);

        payload = {};
        for (name in regions) {
            if (regions.hasOwnProperty(name)) {
                payload[name] = regions[name]
            }
        }

        data = setData(payload);

        function onStateChange(ev) {
            if (ev.target.readyState === 4) {
                console.log(data);
                editor.busy(false);
                if (ev.target.status === 200) {
                    new ContentTools.FlashUI('ok');
                } else {
                    new ContentTools.FlashUI('no');
                }
            }
        }

        let xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', onStateChange);
        xhr.open('POST', apiURL);
        xhr.send(JSON.stringify(data));
    });
}

export function initEditor(apiURL, setData) {
    createEditor(apiURL, setData);
}

export function destroyEditor() {
    ContentTools.EditorApp.get().destroy();
}

export function saveImage(dialog) {
    let image, xhr, xhrComplete, xhrProgress, url, size;

    function sizeSet(newSize) {
        size = newSize;
    }

    dialog.addEventListener('imageuploader.fileready', function (ev) {

        let formData;
        let file = ev.detail().file;

        xhrProgress = function (ev) {
            dialog.progress((ev.loaded / ev.total) * 100);
        }

        xhrComplete = function (ev) {
            let response;

            if (ev.target.readyState !== 4) {
                return;
            }



            xhr = null
            xhrProgress = null
            xhrComplete = null

            if (ev.target.status === 200) {
                response = JSON.parse(ev.target.responseText);

                url = response.url;
                size = getImageDimensions(file, sizeSet);

                image = {
                    size: size,
                    url: url
                };

                dialog.populate(image.url, image.size);

            } else {
                new ContentTools.FlashUI('no');
            }
        }

        dialog.state('uploading');
        dialog.progress(0);

        formData = new FormData();
        formData.append('image', file);

        xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', xhrProgress);
        xhr.addEventListener('readystatechange', xhrComplete);
        xhr.open('POST', `/api/upload/image`, true);
        xhr.send(formData);
    });

    dialog.addEventListener('imageuploader.save', function () {
        var crop, cropRegion, formData;

        xhrComplete = function (ev) {
            if (ev.target.readyState !== 4) {
                return;
            }

            xhr = null
            xhrComplete = null

            dialog.busy(false);

            if (ev.target.status === 200) {
                let response = JSON.parse(ev.target.responseText);

                dialog.save(
                    url,
                    size,
                    {
                        'alt': response.alt,
                        'data-ce-max-width': size,
                    });

                console.log(response);

            } else {
                new ContentTools.FlashUI('no');
            }
        }

        dialog.busy(true);

        formData = new FormData();
        formData.append('url', image.url);

        if (dialog.cropRegion()) {
            formData.append('crop', dialog.cropRegion());
        }

        // Make the request
        xhr = new XMLHttpRequest();
        xhr.addEventListener('readystatechange', xhrComplete);
        xhr.open('POST', `/api/upload/insert/image`, true);
        xhr.send(formData);
    });

}

export function getImageDimensions(file, func) {
    let reader = new FileReader()
    let size;
    reader.onload = function (e) {
        let image = new Image()
        image.src = e.target.result
        image.onload = function (e) {
            const width = image.width
            const height = image.height
            func([width, height]);
        }
    }
    reader.readAsDataURL(file);
}

