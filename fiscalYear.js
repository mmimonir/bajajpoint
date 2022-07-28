function fiscal_year(new_date) {
    const date = new Date(new_date);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;

    let fiscal_year;

    month + 1 <= 6
        ? (fiscal_year = `${year - 1}-${year}`)
        : (fiscal_year = year + "-" + (year + 1));

    return fiscal_year;
}

console.log(fiscal_year("2022-01-01"));
