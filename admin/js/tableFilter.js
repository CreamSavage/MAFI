// Simple reusable table filter with counter and column selector
// Usage: initTableFilter({ inputSelector: '#search', tableSelector: '#table', counterSelector: '#count', selectSelector: '#col-select' })
(function(global){
  function initTableFilter(opts){
    if (!opts) return;
    const input = typeof opts.inputSelector === 'string' ? document.querySelector(opts.inputSelector) : opts.inputSelector;
    const table = typeof opts.tableSelector === 'string' ? document.querySelector(opts.tableSelector) : opts.tableSelector;
    const counter = opts.counterSelector ? (typeof opts.counterSelector === 'string' ? document.querySelector(opts.counterSelector) : opts.counterSelector) : null;
    const select = opts.selectSelector ? (typeof opts.selectSelector === 'string' ? document.querySelector(opts.selectSelector) : opts.selectSelector) : null;
    if (!input || !table) return;

    const tbody = table.tBodies && table.tBodies[0] ? table.tBodies[0] : table.querySelector('tbody');
    if (!tbody) return;

    const rows = Array.from(tbody.querySelectorAll('tr'));
    const dataRows = rows.filter(r => !r.classList.contains('no-data-row'));
    const total = dataRows.length;

    // Cache cell text for each data row
    const rowCellsText = rows.map(tr => Array.from(tr.children).map(td => td.innerText.toLowerCase()));

    function updateCounter(visible){
      if (counter) {
        counter.textContent = `Mostrando ${visible} de ${total}`;
      }
    }

    function filter(){
      const q = input.value.trim().toLowerCase();
      const colIndex = select && select.value !== 'all' ? parseInt(select.value, 10) : null;
      let visible = 0;
      rows.forEach((tr, i) => {
        // Skip no-data rows when filtering
        if (tr.classList.contains('no-data-row')) {
          tr.style.display = q ? 'none' : '';
          return;
        }
        const cells = rowCellsText[i];
        let matches = true;
        if (q) {
          if (colIndex !== null) {
            // Search in specific column
            matches = cells[colIndex] && cells[colIndex].includes(q);
          } else {
            // Search in all columns
            matches = cells.some(txt => txt.includes(q));
          }
        }
        tr.style.display = matches ? '' : 'none';
        if (matches) visible++;
      });
      updateCounter(visible);
    }

    // Initial paint
    updateCounter(total);

    input.addEventListener('input', filter);
    if (select) select.addEventListener('change', filter);
  }

  // expose
  global.initTableFilter = initTableFilter;
})(window);

