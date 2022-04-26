  function showDistrict(id) {
        var xhttp;
         document.getElementById("district").innerHTML = "<option value=''>Please Select A District</option>";
         document.getElementById("thana").innerHTML = "<option value=''>Please Select A Thana</option>";
        if (id == "") {
            //document.getElementById("district").innerHTML = "";
            return false;
        }
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("district").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getdistrict.php?id=" + id, true);
        xhttp.send();
    }
    
    
     function showThana(thana_id) {
        var xhttp;
        if (thana_id == "") {
            document.getElementById("thana").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("thana").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getthana.php?id=" + thana_id, true);
        xhttp.send();
    }
    
    
    
     function showUnion(union_id) {
        var xhttp;
        if (union_id == "") {
            document.getElementById("union").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("union").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getunion.php?id=" + union_id, true);
        xhttp.send();
    }
    