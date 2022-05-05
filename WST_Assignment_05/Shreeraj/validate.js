function validateform() {
    var fname = document.form1.fname.value;
    var lname = document.form1.lname.value;
    var uname = document.form1.uname.value;
    var mail = document.form1.mail.value;
    var state = document.form1.state.value;
    var mobile = document.form1.mobile.value;
    var country = document.form1.country.value;
    var Education = document.form1.Education.value;
    var interest = document.form1.interest.value;
    var skill = document.form1.skill.value;
    var pass = document.form1.pass.value;

    if (fname == "" || !fname.match(/^[a-zA-Z]+$/) || fname.length <= 1) {
      alert("please fill first name in right format");
      return false;
    }
    else if (lname == "" || !lname.match(/^[a-zA-Z]+$/) || lname.length <= 1) {
      alert("please fill last name in right format");
      return false;
    }
    else if (uname == "" || !uname.match(/^[0-9a-zA-Z]+$/) || uname.length <= 3) {
      alert("please fill  username in right format");
      return false;
    }
    else if (mail == "" || !mail.match(/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/) || mail.length <= 2) {
      alert("please fill  mail in right format");
      return false;
    }
    else if (state == "" || !state.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || state.length < 2) {
      alert("please fill state in right format");
      return false;
    }
    else if (country == "" || !country.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || country.length < 2) {
      alert("please fill country in right format");
      return false;
    }
    else if (mobile == "" || !mobile.match(/^[0-9]+$/) || mobile.length < 10 || mobile.length > 10 ) {
      alert("please fill mobile number in right format");
      return false;
    }
    else if (Education == "" || !Education.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || Education.length < 2) {
      alert("please fill Education in right format");
      return false;
    }
    else if (interest == "" || !interest.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || interest.length < 2) {
      alert("please fill interest in right format");
      return false;
    }
    else if (skill == "" || !skill.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || skill.length < 2) {
      alert("please fill skill in right format");
      return false;
    }
    else if (pass == "" || !pass.match(/^[a-zA-Z]+[a-zA-Z ]+$/) || pass.length < 2) {
      alert("please fill password in right format");
      return false;
    }
  }
