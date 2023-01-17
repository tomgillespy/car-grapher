require('./bootstrap');

window.corsGet = (url, requiresAllOrigins = false) => {
    return new Promise((resolve, reject) => {
        if (localStorage.getItem('url-' + url)) {
            resolve(localStorage.getItem('url-' + url));
        } else {
            if (requiresAllOrigins) {
                axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url))
                    .then(response => {
                        try {
                            localStorage.setItem('url-' + url, response.data.contents);
                        } catch (e) {
                        }
                        resolve(response.data.contents);
                    })
                    .catch(error => {
                        reject(error);
                    });
            } else {
                axios.get(url)
                    .then(response => {
                        try {
                            localStorage.setItem('url-' + url, response.data.contents);
                        } catch (e) {
                        }
                        resolve(response.data.contents);
                    })
                    .catch(error => {
                        reject(error);
                    });
            }
        }
    })
}
