function Register() {
    let name = document.getElementsByName("name")[0].value;
    let login = document.getElementsByName("login")[0].value;
    let password = document.getElementsByName("password")[0].value;
    let password_repeat = document.getElementsByName("confirm_password")[0].value;
    let email = document.getElementsByName("email")[0].value;
    let checkbox = document.getElementById("checkbox").checked;
    
    function CheckName(name) 
    {
        if (/^[а-яА-ЯёЁ -]+$/.test(name) == false)
            document.getElementById("status").innerHTML = "только кириллические буквы, дефис и пробелы";
        else 
        {
            document.getElementById("status").innerHTML = "Ваше ФИО валидное";
            return true;
        }
    }
    
    function CheckEmail(email)
    {
        if (/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email) == false)
            document.getElementById("status").innerHTML = "еmail не валидный, только латиница";
        else 
        {
            document.getElementById("status").innerHTML = "Ваш email валидный";
            return true;
        }
    }
    
    function CheckPasswords(pas,repas) 
    {
        if (pas == repas) 
        {
            document.getElementById("status").innerHTML = "Пароли совпадают";
            return true;
        } else
            document.getElementById("status").innerHTML = "Пароли не совпадают";
    }
    
    function CheckBox(checkbox) 
    {
        if (checkbox) 
        {
            document.getElementById("status").innerHTML = "Согласие на БПД дано";
            return true;
        } else 
            document.getElementById("status").innerHTML = "Согласие на БПД не дано";
    }
    
    if (CheckBox(checkbox) && CheckPasswords(password, password_repeat) && CheckEmail(email) && CheckName(name))
    {
        document.location.href= await "/";
    }
    

}