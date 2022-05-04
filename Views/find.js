function search(){
    var link = "find.pgghp?key=" + document.getElementsById("search1")[0].value;
    var form = document.getElementById('searchform');
    form.action = link ;
}