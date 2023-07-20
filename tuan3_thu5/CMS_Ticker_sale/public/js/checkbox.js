const checkbox_retail = document.getElementById('check_retail');
const input_retail = document.getElementById('retail');

checkbox_retail.addEventListener('change', function() {
    input_retail.disabled = !checkbox_retail.checked;
});
// ===============================================================================
const checkbox_retail_update = document.getElementById('check_retail_update');
const input_retail_update = document.getElementById('retail_update');

checkbox_retail_update.addEventListener('change', function() {
    input_retail_update.disabled = !checkbox_retail_update.checked;
});
// ===============================================================================
const checkbox_combo = document.getElementById('check_combo');
const input_combo1 = document.getElementById('combo1');
const input_combo2 = document.getElementById('combo2');

checkbox_combo.addEventListener('change', function() {
    input_combo1.disabled = !checkbox_combo.checked;
    input_combo2.disabled = !checkbox_combo.checked;
});
// ===============================================================================
const check_combo_update = document.getElementById('check_combo_update');
const input_combo3 = document.getElementById('combo3');
const input_combo4 = document.getElementById('combo4');

check_combo_update.addEventListener('change', function() {
    input_combo3.disabled = !check_combo_update.checked;
    input_combo4.disabled = !check_combo_update.checked;
});