function 
  myfunction(){
  document.getElementById("myDropdown").classList.toggle("hide"); // when it loads show all the products
};

function 
  filterFunction(){
  var input, filter, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
};

$(document).ready(function(){
  $(".filter-button").click(function(){
      var value = $(this).attr('data-filter');
      if(value == "all")
      {
          //$('.filter').removeClass('hidden');
          $('.filter').show('1000');
      }
      else
      {
          $(".filter").not('.'+value).css("display","none");
          $('.filter').filter('.'+value).show('1000');
      }
  });
});

//CALCULATE TOTAL PRICE FOR CHECKED ITEMS
