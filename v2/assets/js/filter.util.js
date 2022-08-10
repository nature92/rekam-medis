function dateToString(date, format = "yyyy-mm-dd") {
  //Format Date
  let mm = date.getMonth() + 1;
  mm = mm <= 9 ? "0" + mm : mm;

  let dd = date.getDate();
  dd = dd <= 9 ? "0" + dd : dd;

  if (format == "yyyy-mm-dd") {
    return `${date.getFullYear()}-${mm}-${dd}`;
  } else {
    return;
  }
}

const masterMonth = [
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "Septemer",
  "Oktober",
  "November",
  "Desember",
];

function getMonthNameByIndex(i) {
  return masterMonth[i];
}

function separateNumber(num) {
  const str1 = num.toString().split(".");
  const str2 = str1[1] ? "," + str1[1].substring(0, 3) : "";
  const str = str1[0].replace(/\d{1,3}(?=(\d{3})+(?!\d))/g, "$&.");
  return str + str2;
}

function toNumberFromLocaleId(str) {
  return +str.replace(/\./g, "").replace(/\,/g, ".");
}

function toStringLocaleId(num) {
  return ("" + num).replace(/\./g, ",");
}
