
function Register(idP, currentAction) {
    name = document.userData.name.value;
    console.log(name);
    occupation = document.userData.occupation.value;
    console.log(occupation);
    age = document.userData.age.value;
    console.log(age);
    city = document.userData.city.value;
    console.log(city);
    website = document.userData.website.value;
    console.log(website);
    // avatar = document.userData.avatar.files;
    // console.log(avatar);
    
    // formData = new FormData();
    // formData.append('avatar', avatar,;
    // console.log(formData);
    ajax = new XMLHttpRequest();


    if (currentAction == 'N') {
        ajax.open("POST", "classes/new.php", true);
    } else if (currentAction == 'E') {
        ajax.open("POST", "classes/edit.php", true);
    }
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            alert('Data was successfully saved');
            window.location.reload(true);
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("name=" + name + "&occupation=" + occupation + "&age=" + age + "&website=" + website + "&city=" + city +"&idP=" + idP)
}
function Delete(idP) {
    if (confirm("Do you want to delete record?")) {
        ajax = objetoAjax();
        ajax.open("POST", "classes/delete.php", true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4) {
                alert('The record was successfully deleted!');
                window.location.reload(true);
            }
        }
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send("idP=" + idP)
    } else {

    }
}

