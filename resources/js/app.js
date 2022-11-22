require('./bootstrap');

window.corsGet = (url) => {
    return new Promise((resolve, reject) => {
        axios.get('https://api.allorigins.win/get?url=' + encodeURIComponent(url))
            .then(response => {
                resolve(response.data.contents);
            })
            .catch(error => {
                console.log(error);
                reject(error);
            });
    })
}
