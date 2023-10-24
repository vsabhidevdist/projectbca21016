document.addEventListener("DOMContentLoaded", function() {
    const accordionItems = document.querySelectorAll(".accordion-item");
  
    accordionItems.forEach(function(item) {
      const header = item.querySelector(".accordion-header");
      const content = item.querySelector(".accordion-content");
  
      header.addEventListener("click", function() {
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    });
  });