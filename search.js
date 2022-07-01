<script>
document.addEventListener("DOMcontentLoaded", () => {
  document.querySelectorAll("searchinput").forEach(inputField => {
    const tableRows = inputField.closest("table").querySelectorAll("tbody tr");
    const headerCell=inputField.parentElement;
    const otherHeaderCells=inputField.closest("tr").querySelectorAll("tbody");

    console.log(tableRows);
    console.log(tableRows);
    console.log(tableRows);
  });

});
</script>
