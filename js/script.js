function setItemToLocalStorage(keyElementId, contentElementId) {
    localStorage.setItem(document.getElementById(keyElementId).innerText, document.getElementById(contentElementId).innerText);
}