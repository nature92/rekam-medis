jQuery.extend(jQuery.fn.dataTableExt.oSort, {
  "local-date-pre": function (str) {
    const x = str.replace(/^(\d+).(\d+).(\d+)$/, "$3$2$1");
    return parseFloat(x);
  },

  "local-date-asc": function (a, b) {
    return a < b ? -1 : a > b ? 1 : 0;
  },

  "local-date-desc": function (a, b) {
    return a < b ? 1 : a > b ? -1 : 0;
  },
});
