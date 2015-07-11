getUrlParam = function(param){
    var results = new RegExp('[\?&]' + param + '=([^&#]*)').exec(window.location.href);
    if (results !== null && results[1]) {
        return decodeURIComponent(results[1]);
    }
    return null;
};
