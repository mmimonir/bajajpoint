function fiscal_year(new_date) {
    const date = new Date(new_date);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;

    let fiscal_year;

    month <= 6
        ? (fiscal_year = `${year - 1}-${year}`)
        : (fiscal_year = `${year}-${year + 1}`);

    return fiscal_year;
}

function getCurrentFinancialYear(sale_date) {
    var financial_year = "";
    var today = new Date(sale_date);
    if (today.getMonth() + 1 <= 6) {
        financial_year = today.getFullYear() - 1 + "-" + today.getFullYear();
    } else {
        financial_year = today.getFullYear() + "-" + (today.getFullYear() + 1);
    }
    return financial_year;
}

console.log(fiscal_year("2022-06-30"));
console.log(getCurrentFinancialYear("2022-06-30"));
