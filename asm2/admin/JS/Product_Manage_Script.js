function ClearForm(){
    document.getElementsByTagName('form')[0].reset();
}

function ValidateForm(){
    var ProductName = document.getElementById("ProductName").value;
    var ProductPrice = document.getElementById("ProductDescription").value;
    var ProductImage = document.getElementById("ProductImage").value;

    if(ProductName == ""){
        alert("Product name is empty!");
        document.getElementById("ProductName").focus();
        return false;
    }
    else if(ProductPrice == ""){
        alert("Product description is empty!");
        document.getElementById("ProductPrice").focus();
        return false;
    }
    else if(ProductImage == ""){
        alert("Product image is empty!");
        return false;
    }
    else{
        return true;
    }
}

function checkLoginForm(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if(username == ""){
        alert('Username is empty!');
        document.getElementById('username').focus();
        return false;
    }
    else if(password == ""){
        alert('Password is empty!');
        document.getElementById('password').focus();
        return false;
    }
    else{
        return true;
    }
}