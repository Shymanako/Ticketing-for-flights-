// let dlBtn = document.getElementById("downl-btn");
// let cardTicket =  document.getElementById("card-container");
// let pdf = new jsPDF("p", "mm", "a4");


//   dlBtn.addEventListener("click", function() {
//     pdf.addHTML(cardTicket, function() {
//         pdf.save("myPDF.pdf");
//     });
//   });

let dlBtn = document.getElementById("downl-btn");
dlBtn.addEventListener("click", function () {
    let doc = new jsPDF("p", "mm", [500, 500]);
    let cardTicket =  document.getElementById("card-container");

    // fromHTML Method
    doc.fromHTML(cardTicket);
    doc.save("output.pdf");
});