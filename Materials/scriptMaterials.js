function openModal(imageSrc, imageName) {
    document.getElementById("modalImage").src = imageSrc;
    document.getElementById("materialName").innerHTML = imageName;
    document.getElementById("myModal").style.display = "flex";
    document.getElementById("materialInput").value = imageName;

}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

var imageContainers = document.querySelectorAll('.image-container');
imageContainers.forEach(function(container) {
    container.addEventListener('click', function() {
        var imageSrc = this.querySelector('img').src;
        var imageName = this.querySelector('h2').innerHTML;
        openModal(imageSrc, imageName);
    });
});

function validateForm() {
    var userInfo = document.querySelector('.userInfo');
    var notLoggedInDiv = userInfo.querySelector('div.notLoggedIn');
    var radioButtons = document.getElementsByName('objectRadio');
    var isChecked = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            isChecked = true;
            break;
        }
    }
    if (notLoggedInDiv) {
        alert('You are not logged in.');
        return false;
    } else {
        if (!isChecked) {
            alert('Please select at least one option.');
            return false;
        }
        return true;
    }



}